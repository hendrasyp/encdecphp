<?php include 'menu.php'; ?>

<script type="text/javascript">
    var f = document.getElementById("form");
    var btn = document.getElementById("button");
    function enc(str,key){
       var i = 0;
       var mystr = new Array();
       var result = "";
       for (i=0;i<=str.length-1;i++)
       {
           mystr[i] = str.charCodeAt(i) + parseInt(key);
       }
       for (i=0;i<=mystr.length-1;i++)
       {
           result = result + String.fromCharCode(mystr[i]);
       }
       document.getElementById("result").value = result;
    }
    function dec(str,key){
       var i = 0;
       var mystr = new Array();
       var result = "";
       for (i=0;i<=str.length-1;i++)
       {
           mystr[i] = str.charCodeAt(i) - parseInt(key);
       }
       for (i=0;i<=mystr.length-1;i++)
       {
           result = result + String.fromCharCode(mystr[i]);
       }
       document.getElementById("result_dec").value = result;
    }
    
</script>
<form id="form" action="index.php?mode=encrypt" method="POST">
    <table>
        <tr>
            <td>Key</td>
            <td>:</td>
            <td><input type="text" value="10" id="key"/></td>
        </tr>
        <tr>
            <td>Kalimat</td>
            <td>:</td>
            <td><input type="text" value="" id="kalimat"/></td>
        </tr>
        <tr>
            <td>Hasil Encrypt</td>
            <td>:</td>
            <td><input type="text" id="result" value=""/></td>
        </tr>
        <tr>
            <td>Hasil Decrypt</td>
            <td>:</td>
            <td><input type="text" id="result_dec" value=""/></td>
        </tr>
        <tr>
            <td colspan="3" >
                <input type="button" id="button" value="Enkrip" onclick="enc(document.getElementById('kalimat').value,document.getElementById('key').value)" />
                <input type="button" id="button" value="Decrypt" onclick="dec(document.getElementById('result').value,document.getElementById('key').value)" />
            </td>
        </tr>
    </table>
</form>
