<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-2">
      <form action="">
        <h2 class="text-center">Select Your Program</h2>
        <div class="container" >
      <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Programs</label>
  <select class="form-select" id="inputGroupSelect01" onchange="mylang(this.value)">
    <option selected>Select Here</option>
    <option value="PHP">PHP</option>
    <option value="JAVASCRIPT">JAVASCRIPT</option>
    <option value="PYTHON">PYTHON</option>
  </select>
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Framework</label>
  <select class="form-select" id="inputGroupSelect02">
    <option selected>Select Here</option>
  </select>
</div>
</div>
      </form>
   
    </div>
 <script>
  function mylang(data){
    const ajaxreq = new XMLHttpRequest();
    ajaxreq.open('GET','getdata.php?selectvalue='+ data,'true');
    ajaxreq.send();
    ajaxreq.onreadystatechange = function(){
      if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {
        document.getElementById('inputGroupSelect02').innerHTML = ajaxreq.responseText;
      }
    };

  }
 </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>