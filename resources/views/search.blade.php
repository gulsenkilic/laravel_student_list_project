<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container" >
    <div> 
    <table class="table">
    <thead>
        <tr>
            <th>@sortablelink('sid')</th>
            <th>@sortablelink('fname')</th>
            <th>@sortablelink('lname')</th>
            <th>@sortablelink('birthplace')</th>
            <th>@sortablelink('birthdate')</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tr><form method="GET" action="{{ route('ogrenciara') }}">{{csrf_field()}}
    <td><input name="sid" id="sid" type="text"></td>
    <td><input name="fname" id="fname" type="text"></td>
    <td><input name="lname" id="lname" type="text"></td>
    <td><input name="birthplace" id="birthplace"></td>
    <td><input name="birthdate" id="birthdate" type="date"></td>
    <td><input name="ara" type="submit"  class="btn btn-dark" value="ARA"></td></form>
    <td><a href="{{ route('index') }}" class="btn btn-sm btn-primary">ANA SAYFA</a></td>
    </tr>
    <tr>
    <td></td><form method="POST" action="{{isset($ogrenci) ? url('ogrenci/kaydet',$ogrenci->sid):url('ogrenci/ekle')}}">{{csrf_field()}}
    <td><input name="fname" id="fname" type="text" value="{{ isset($ogrenci) ?  $ogrenci->fname:''}}" required></td>
    <td><input name="lname" id="lname" type="text" value="{{ isset($ogrenci) ?  $ogrenci->lname:''}}" required></td>
    <td><input name="birthplace" id="birthplace" value="{{ isset($ogrenci) ?  $ogrenci->birthplace:''}}" type="text"  required></td>
    <td><input name="birthdate" id="birthdate" value="{{ isset($ogrenci) ?  $ogrenci->birthdate:''}}" type="date"  required></td>
    <td><button type="reset"  class="btn btn-danger  btn-block">TEMİZLE</button></td>
    <td><input name=ekle type="submit"  class="btn btn-primary  btn-block" onclick="return confirm('BU ÖĞRENCİYİ EKLEMEK İSTİYOR MUSUNUZ?')" class="btn btn-sm btn-danger" value="{{ isset($ogrenci) ? 'KAYDET' :'EKLE' }}"></td> </form>
    </tr>
    <tbody>
        
    @foreach($student as $key =>$student2)
    <tr>
             <td>{{$student2->sid}}</td> 
             <td>{{$student2->fname}}</td>
             <td>{{$student2->lname}}</td> 
             <td>{{$student2->birthplace}}</td> 
             <td>{{$student2->birthdate}}</td> 
             <td><a href="{{ route('ogrencisil', ['sid'=>$student2->sid]) }}"  onclick="return confirm('BU ÖĞRENCİYİ SİLMEK İSTİYOR MUSUNUZ?')" class="btn btn-sm btn-danger">OGRENCI SIL</a></td>
             <td><a href="{{ route('ogrenciguncelle', ['sid'=>$student2->sid]) }}"class="btn btn-sm btn-primary">OGRENCI GUNCELLE</a></td>
    </tr>
    @endforeach
    </tbody>
    </thead>
    </table>
    <div class="d-flex justify-content-center">
    {{$student->links()}} 
    </div>
    </div>
</div>


</body>
</html>