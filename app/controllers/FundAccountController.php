<?php
namespace Zikzay\Controller;


use Zikzay\Core\Controller;
use Zikzay\core\Session;
use Zikzay\lib\Paystack;
use Zikzay\Lib\Util;
use Zikzay\libs\Monnify;
use Zikzay\Model\BankAccounts;
use Zikzay\Model\Banks;
use Zikzay\Model\FundHistory;
use Zikzay\Model\NariaWallets;
use Zikzay\Model\TransactionHistory;
use Zikzay\Model\Users;


class FundAccountController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->guide('user');
    }

    public function index ($params)
    {$data = null;
        if(is_array($params)) {
            $data[$params[0]] = $params[1];
            if($params[0] == 'successResponse') {
                $data['href'] = 'wallets';
            } else {
                $data['href'] = 'fund-account';
            }
        }
        $this->render("user.dashboard.fund-account", $data);
    }

    public function wallets ()
    {

        $this->render("user.dashboard.wallets");
    }

    public function withdraw()
    {
        if ($this->user != null) {
            $bankAccount = BankAccounts::search('user', $this->user);
            if ($bankAccount != false) {
                $fund = new FundHistory();
                $this->request($fund);
                $bankCode = Banks::search('name', $bankAccount->bank_name)->code;
                $naira = NariaWallets::search('user', $this->user);

                $balance = $naira->balance;
                if($balance >= $fund->amount) {

                    $naira->balance = $balance - $fund->amount;
                    $naira->save();


                    $reference = Util::reference(12, 'mfy');
                    $response = Monnify::transfer($fund->amount, $reference, 'Test withdrawal', $bankCode, $bankAccount->account_number);


                    $trx = new TransactionHistory();
                    $trx->user = $this->user;
                    $trx->currency = "NGN";
                    $trx->amount = $fund->amount;
                    $trx->title = "Withdraw fund";
                    $trx->reference = $reference;

                    $fund->reference = $reference;
                    $fund->currency = 'NGN';
                    $fund->source = "Monnify";
                    $fund->amount = -$fund->amount;

                    if(isset($response->status)) {
                        if($response->status = "SUCCESS") {

                            $fund->status = $trx->status = "SUCCESS";
                            $fund->save();
                            $trx->description = "Transaction was successful";
                            $trx->save();

                            $this->apiData($response);
                        }
                        $fund->status = $response->status;

                    } else {
                        $fund->status =  $trx->status = "FAILED";
                    }

                    $trx->description = "Transaction failed";
                    $trx->save();

                    $fund->save();
                    $this->apiFailed('Transaction failed');

                } else {
                    $this->apiFailed('Insufficient balance in naira wallet');
                }
            } else {
                $this->apiFailed('Bank account not updated');
            }
        } else {
            $this->apiFailed('Undefined user');
        }
    }

    public function withdrawalDetails(){

        if ($this->user != null) {
            $reference = $this->posted('reference');

            $response = Monnify::transferDetails($reference);
            $this->apiData($response);

        }
    }

    public function paystack() {
        $user = Users::find($this->user);
        $fund = new FundHistory();
        $this->request($fund);

        $name = "$user->first_name $user->surname";
        $email = $user->email_address;
        $amount = $fund->amount * 100;
        $description = "Fund Naira account";
        $reference = Util::reference(12, 'psk');

        $fund->user = $this->user;
        $fund->reference = $reference;
        $fund->source = "PAYSTACK";
        $fund->currency = 'NGN';
        $fund->status = 'PENDING';
        $fundId = $fund->save();

        $payment = Paystack::initPayment($amount, $email, $reference, $description, $name);

        if($payment != null) {

            $fund->source_reference = $payment->access_code;
            $fund->id = $fundId;
            $fund->save();

            Session::set('paystackRef', $payment->access_code);
            Session::set('paystackPaymentRef', $payment->reference);
            $checkoutUrl = $payment->authorization_url;
            //            dnd($checkoutUrl);
            Util::redirect($checkoutUrl, true);
        }
        $fund->status = 'FAILED';
        $fund->id = $fundId;
        $fund->save();
    }

    public function monnify() {
        $user = Users::find($this->user);
        $fund = new FundHistory();
        $this->request($fund);

        $name = "$user->first_name $user->surname";
        $email = $user->email_address;
        $amount = $fund->amount;
        $description = "Fund Naira account";
        $reference = Util::reference(12, 'mff');

        $fund->user = $this->user;
        $fund->reference = $reference;
        $fund->source = "MONNIFY";
        $fund->currency = 'NGN';
        $fund->status = 'PENDING';
        $fundId = $fund->save();

        $monnify = new Monnify();
        $payment = $monnify->initPayment($amount, $reference, $description, $name, $email);
        if($payment != null) {

            $fund->source_reference = $payment->transactionReference;
            $fund->id = $fundId;
            $fund->save();

            Session::set('monnifyRef', $payment->transactionReference);
            Session::set('monnifyPaymentRef', $payment->paymentReference);
            $checkoutUrl = $payment->checkoutUrl;
//            dnd($checkoutUrl);
            Util::redirect($checkoutUrl, true);
        }
        $fund->status = 'FAILED';
        $fund->id = $fundId;
        $fund->save();
//        self::redirect('');
    }

    public function verifyMonnify(){
        $reference = $this->posted('source_reference');
        if($reference == null) $reference = $this->get('paymentReference');

        $dbFund = FundHistory::search('source_reference', $reference);
        if($dbFund == false) $dbFund = FundHistory::search('reference', $reference);

        $fund = new FundHistory();
        $this->request($fund);
        $monnifyRef = $fund->source_reference;
        if($dbFund != false) {
            $fund->id = $dbFund->id;
            if($dbFund->status == "PAID"){
                $data = $dbFund;
                $nairaWallet = NariaWallets::search('user', $this->user);
                $data->nairaBalance = $nairaWallet->balance;
                $this->apiData($data,"Transaction has already been verified");
            }
            if($monnifyRef == null) $monnifyRef = $dbFund->source_reference;
        }


        $monnify = new Monnify();
        $payment = $monnify->transactionStatus($monnifyRef);

        if($payment != null) {
            if(isset($payment->paymentStatus)) {
                $paymentRef = $payment->paymentReference;
                $amountPaid = $payment->amountPaid;
                $totalPayable = $payment->totalPayable;
                $returnAmount = $payment->settlementAmount;
                $currency = $payment->currency;

                $fund->source = 'MONNIFY';
                $fund->currency = $currency;
                $fund->reference = $paymentRef;
                $fund->user = $this->user;
                $fund->status = $payment->paymentStatus;

                $fund->save();
                $data = $fund;
                if ($payment->paymentStatus == "PAID") {
                    $nairaWallet = NariaWallets::search('user', $this->user);
                    $nairaWallet->balance = $nairaWallet->balance + $amountPaid;
                    $nairaWallet->save();

                    $trx = new TransactionHistory();
                    $trx->user = $this->user;
                    $trx->currency = "NGN";
                    $trx->amount = $amountPaid;
                    $trx->title = "Fund Account";
                    $trx->description = "NGN{$amountPaid} has been created to you Naira wallet";
                    $trx->reference = $paymentRef;
                    $trx->status = "SUCCESS";
                    $trx->save();

                    $data->nairaBalance = $nairaWallet->balance;
                }
                if(self::$mobileApiCall) {
                    $this->apiData($data, $payment->paymentStatus);
                }
                self::redirect("fund-account/index/successResponse/{$trx->description}");
            }
        }
        if(self::$mobileApiCall) {
            $this->apiFailed();
        }
        self::redirect("fund-account/index/errorResponse/Transaction failed, try again");

    }

    public function verifyPaystack() {
        $reference = $this->posted('source_reference');
        if($reference == null) $reference = $this->get('reference');
        $dbFund = FundHistory::search('source_reference', $reference);
        if($dbFund == false)$dbFund = FundHistory::search('reference', $reference);
        $fund = new FundHistory();
        $this->request($fund);

        if($dbFund != false) {
            $fund->id = $dbFund->id;
            if($dbFund->status == "PAID"){
                $data = $dbFund;
                $nairaWallet = NariaWallets::search('user', $this->user);
                $data->nairaBalance = $nairaWallet->balance;
                $this->apiData($data,"Transaction has already been verified");
            }
        }


        $paystack = Paystack::init($reference);
        if($dbFund == false) {
            $fund = new FundHistory();
            $this->request($fund);
        }

        if($paystack->oldTransaction) {

            $fund->source = 'PAYSTACK';
            $fund->currency = 'NGN';
            $fund->reference = $reference;
            $fund->amount = $paystack->amount;
            $fund->source_reference = $paystack->reference;
            $fund->user = $this->user;
            $fund->status = 'PAID';
            $data = $fund;
            $fund->save();
            $this->apiData($data, 'Transaction has already been verified');
        } else
        if($paystack->status) {
            $fund->source = 'PAYSTACK';
            $fund->currency = 'NGN';
            $fund->reference = $reference;
            $fund->amount = $paystack->amount;
            $fund->source_reference = $paystack->reference;
            $fund->user = $this->user;
            $fund->status = 'PAID';

            $trx = new TransactionHistory();
            $trx->user = $this->user;
            $trx->currency = "NGN";
            $trx->amount = $paystack->amount;
            $trx->title = "Fund Account";
            $trx->description = "NGN{$paystack->amount} has been created to you Naira wallet";
            $trx->reference = $reference;
            $trx->status = "SUCCESS";
            $trx->save();

            $fund->save();

            $nairaWallet = NariaWallets::search('user', $this->user);
            $nairaWallet->balance = $nairaWallet->balance + $paystack->amount;
            $nairaWallet->save();
            $data = $fund;
            $data->nairaBalance = $nairaWallet->balance;
            if(self::$mobileApiCall) {
                $this->apiData($data, $trx->description);
            }
            self::redirect("fund-account/index/successResponse/{$trx->description}");
        }
        if(self::$mobileApiCall) {
            $this->apiFailed();
        }
        self::redirect("fund-account/index/errorResponse/Transaction failed, try again");


    }

}