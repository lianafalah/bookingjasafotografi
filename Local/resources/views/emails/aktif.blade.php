@extends('member.tes')
@section('main')

<p> Dear {{$nama}} </p>
<p> Please verify your account </p>
<a href="{{ route ('email.aktif',$id_member) }}" target="_blank"><button style="color: blue;">Verivikasi Akun</button></a>
@endsection