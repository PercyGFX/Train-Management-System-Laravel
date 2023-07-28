
<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to PayHere...</title>
</head>
<body>
    <p>Please wait, redirecting to PayHere payment gateway...</p>
    <form id="payhereForm" action="https://sandbox.payhere.lk/pay/checkout" method="post">
        @foreach($paymentData as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <input type="submit" value="Pay Now" style="display:none;">
    </form>
    <script>
        document.getElementById("payhereForm").submit();
    </script>
</body>
</html>