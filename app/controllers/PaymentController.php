<?php
namespace Zikzay\Controller;


use Zikzay\Core\Controller;
use Zikzay\core\Session;
use Zikzay\lib\Paystack;
use Zikzay\Lib\Util;
use Zikzay\libs\Monnify;
use Zikzay\Model\PUTMETransactions;
use Zikzay\Model\Students;

class PaymentController extends Controller
{

    public function __construct()
    {
        parent::__construct();

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

    public function paystack() {
        $student = Students::find($this->utme);
        $payment = new PUTMETransactions();
        $this->request($payment);

        $name = "$student->first_name $student->surname";
        $email = $student->email_address;
        $amount = 1200 * 100;
        $description = "Payment for UTME screening";
        $purpose = "PUTME";
        $reference = Util::reference(12, 'psk');


        $payment->student = $this->utme;
        $payment->reference = $reference;
        $payment->description = $description;
        $payment->purpose = $purpose;
        $payment->source_reference = $reference;
        $payment->amount = $amount / 100;
        $payment->source = "PAYSTACK";
        $payment->status = 'PENDING';
        $paymentId = $payment->save();

        $paystack = Paystack::initPayment($amount, $email, $reference, $description, $name);

        if($paystack != null) {

            $payment->source_reference = $paystack->access_code;
            $payment->id = $paymentId;
            $payment->save();

            $checkoutUrl = $paystack->authorization_url;
            Util::redirect($checkoutUrl, true);
        }
        $payment->status = 'FAILED';
        $payment->id = $paymentId;
        $payment->save();
    }

    public function monnify() {
        $student = Students::find($this->utme);
        $payment = new PUTMETransactions();
        $this->request($payment);

        $name = "$student->first_name $student->surname";
        $email = $student->email_address;
        $amount = 1000;
        $description = "Payment for UTME Screening";
        $purpose = "PUTME";
        $reference = Util::reference(12, 'mff');

        $payment->student = $this->utme;
        $payment->source_reference = $reference;
        $payment->reference = $reference;
        $payment->source = "MONNIFY";
        $payment->amount = $amount;
        $payment->purpose = $purpose;
        $payment->description = $description;
        $payment->status = 'PENDING';
        $paymentId = $payment->save();

        $monnify = new Monnify();
        $monnifyPayment = $monnify->initPayment($amount, $reference, $description, $name, $email);
        if($monnifyPayment != null) {

            $payment->source_reference = $monnifyPayment->transactionReference;
            $payment->id = $paymentId;
            $payment->save();

            $checkoutUrl = $monnifyPayment->checkoutUrl;
            Util::redirect($checkoutUrl, true);
            exit();
        }
        $payment->status = 'FAILED';
        $payment->id = $payment;
        $payment->save();
    }

    public function verifyMonnify(){
        $reference = $this->get('paymentReference');

        $dbFund = PUTMETransactions::search('source_reference', $reference);
        if($dbFund == false) $dbFund = PUTMETransactions::search('reference', $reference);
//dnd($dbFund);
        $payment = new PUTMETransactions();
        $this->request($payment);

        $student = Students::find($this->utme);
        $student->payment = 1;

        $monnifyRef = $payment->source_reference;
        if($dbFund != false) {
            $payment->id = $dbFund->id;
            if($dbFund->status == "PAID"){
                $student->save();

                self::redirect('postUTME/registration');
                exit();
            }
            if($monnifyRef == null) $monnifyRef = $dbFund->source_reference;
        }


        $monnify = new Monnify();
        $payMonnify = $monnify->transactionStatus($monnifyRef);

        if($payMonnify != null) {

            if(isset($payMonnify->paymentStatus)) {
                $paymentRef = $payMonnify->paymentReference;
                $amountPaid = $payMonnify->amountPaid;
                $totalPayable = $payMonnify->totalPayable;
                $returnAmount = $payMonnify->settlementAmount;

                $payment->source = 'MONNIFY';
                $payment->reference = $paymentRef;
                $payment->student = $this->utme;
                $payment->status = $payMonnify->paymentStatus;

                $payment->save();

                self::redirect("postUTME/registration");
                exit();
            }
        }

        Session::set('submitError', 'The session has an error');

        self::redirect("postUTME/payment");

    }

    public function verifyPaystack() {

        $reference = $this->get('reference');
        $dbFund = PUTMETransactions::search('source_reference', $reference);
        if($dbFund == false)$dbFund = PUTMETransactions::search('reference', $reference);
        $payment = new PUTMETransactions();
        $this->request($payment);

        $student = Students::find($this->utme);
        $student->payment = 1;
        if($dbFund != false) {
            $payment->id = $dbFund->id;
            if($dbFund->status == "PAID"){
                $student->save();

                self::redirect('postUTME/registration');
            }
        }


        $paystack = Paystack::init($reference);
        if($dbFund == false) {
            $payment = new PUTMETransactions();
            $this->request($payment);
        }

        if($paystack->oldTransaction) {

            $payment->source = 'PAYSTACK';
            $payment->reference = $reference;
            $payment->amount = $paystack->amount;
            $payment->source_reference = $paystack->reference;
            $payment->student = $this->utme;
            $payment->status = 'PAID';
            $payment->save();

            $student->save();

            self::redirect('postUTME/registration');
            exit();
        } else
            if($paystack->status) {
                $payment->source = 'PAYSTACK';
                $payment->reference = $reference;
                $payment->amount = $paystack->amount;
                $payment->source_reference = $paystack->reference;
                $payment->student = $this->utme;
                $payment->status = 'PAID';

                $payment->save();
                $student->save();
                self::redirect("postUTME/registration");
                exit();
            }
            Session::set('submitError', 'The session has an error');

        self::redirect("postUTME/payment");


    }

}