<html>
<head>
</head>
<body>
  <div id="intaval"></div>
  <script type="application/javascript">
    console.log(document.getElementById('intaval'));
    let jsvar = 5; 
    const id = setInterval(() => {

      document.getElementById('intaval').innerHTML=`<h1>IMPORTANT ERROR ${jsvar--}초뒤 바이바이</h1>`;
    }, 1000);
    setTimeout(() =>{
      clearInterval(id);
      location.href="http://localhost:3000/run-php-mysql/index.php"
    }, 6000);
</script>
</body>
</html>