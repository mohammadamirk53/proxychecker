<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['proxy'])) {
    $proxy = $_POST['proxy'];

    // Function to check the proxy
    function checkProxy($proxy) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.ipify.org/"); // Replace with the actual URL to test the proxy
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) {
            return "Aprovada: $proxy\n ✅";
        } else {
            return "Reprovada: $proxy\n ❌";
        }
    }

    $result = checkProxy($proxy);
    echo $result;
}
?>
