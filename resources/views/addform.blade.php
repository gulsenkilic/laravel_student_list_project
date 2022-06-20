<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>
<div  align="center"> 
    <form method="POST" action="{{ isset($ogrenci) ? url('ogrenci/kaydet',$ogrenci->sid):url('ogrenci/ekle')}}">
            {{csrf_field()}}
            <h3>YENI OGRENCI</h3>
    <table class="table table-hover">
    <tr><td>AD</td><td><input id="fname" type=text value="{{ isset($ogrenci) ?  $ogrenci->fname:''}}" required></td></tr>
    <tr><td>SOYAD</td><td><input name="lname" type=text value="{{ isset($ogrenci) ?  $ogrenci->lname:''}}" required></td></tr>
    <tr><td>DOĞUM YERİ</td><td><input id="birthplace" value="{{ isset($ogrenci) ?  $ogrenci->birthplace:''}}" type=text  required></td></tr>
    <tr><td>DOĞUM TARİHİ</td><td><input id="birthdate" value="{{ isset($ogrenci) ?  $ogrenci->birthdate:''}}" type=date  required></td></tr>
    <tr><td></td><td><button type="reset" class="btn btn-danger  btn-block">TEMİZLE</button></td></tr>
    <tr><td></td><td><input name=ekle type=submit  class="btn btn-danger  btn-block" value="{{ isset($ogrenci) ? 'KAYDET' :'EKLE' }}"></td></tr>
    </table>    
        </form>
    </div>

</body>
</html>