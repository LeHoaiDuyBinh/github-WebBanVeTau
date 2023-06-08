<style>
    .body-page {
        margin-top: 110px;
        background-color: #fff;
        font-family: Arial, sans-serif;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }
    .qr {
        text-align: center;
        width: 50%;
        height: 70%;
        padding: 30px;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
    h1 {
        font-size: 30px;
        color: #01b3a7;
        margin-bottom: 20px;
    }
    #qr-code {
        width: 200px;
        height: 200px;
        border: 10px solid #01b3a7;
        border-radius: 5px;
        background-color: white;
        padding: 10px;
        box-sizing: border-box;
        display: inline-block;
    }
    .success-notification {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(1, 179, 167, 0.85);
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        font-size: 18px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
    .success-notification span {
        display: block;
        font-size: 40px;
        margin-bottom: 10px;
    }

    .button {
        width: 40%;
        height: 10%;
        display: none;
    }

    .text-button[type="submit"] {
        white-space: inherit;
        width: 50%;
    }

    @media (max-width: 992px) {
        .body-page {
            margin-top: 0px;
        }

        .qr {
            text-align: center;
            width: 80%;
            height: 70%;
            padding: 30px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 30px;
        }

        #qr-code {
            width: 210px;
            height: 210px;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var successNotification = document.querySelector(".success-notification");
            successNotification.style.display = "block";
        }, 5000);
        setTimeout(function() {
            var successNotification = document.querySelector(".success-notification");
            successNotification.style.display = "none";
        }, 8000);
        setTimeout(function() {
            var button = document.querySelector(".button");
            button.style.display = "block";
        }, 9000);
    });
</script>

<div class="body-page">
    <div class="qr">
        <h1><strong>Quét mã QR để hoàn tất thanh toán</strong></h1>
        <div id="qr-code">
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=https%3A%2F%2Fexample.com&size=200x200" alt="QR Code">
        </div>
    </div>
    <div class="success-notification">
        <span>&#10004;</span>
        <p style="color: #fff;">Thanh toán thành công!</p>
    </div>
    <div class="button">
        <button type="submit" class="btn btn-primary text-button" style="margin-top: 10px; overflow: hidden !important;">Hoàn tất</button>
    </div>
</div>