
if(document.getElementById("print-out") != null) {
    document.getElementById("print-out").addEventListener('click', printOut);
}
function printOut() {
    let prtContent = document.getElementById("printThis");
    let WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.write(cssLinkTag)
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}

$(document).ready(function () {
    const imageImg = $('#image-img');
    const image = $('#image');
    imageImg.click(function () {
        image.click();
    });

    image.change(function () {
        let image = document.getElementById('image');
        loadImage(this, imageImg);
    });
});


function loadImage(input, image) {
    if(input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            image.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0])
    }
}

/*

$.fn.extend({
    print: function() {
        let frameName = 'printIframe';
        let doc = window.frames[frameName];
        if (!doc) {
            $('<iframe>').hide().attr('name', frameName).appendTo(document.body);
            doc = window.frames[frameName];
        }
        doc.document.body.innerHTML = this.html();
        doc.window.print();
        return this;
    }
});*/
