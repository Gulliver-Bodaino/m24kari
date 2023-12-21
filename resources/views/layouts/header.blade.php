@if( Auth::check() )
    {{-- 認証あり --}}
    {{-- ログアウト --}}
    <form method="post" action="{{ url('/logout')}}" id="logout" name="logout">
        {{ csrf_field() }}
    </form>
    {{-- 設定で表示非表示 --}}
    @if(config('myapp.auto_create_user_login') == false)
        <div class="alignright">
            <img src="images{{config('myapp.image_folder')}}/logout.jpg"  onclick="$('#logout').submit();">
        </div>
    @endif
@else
    {{-- 認証なし --}}
@endif
<?php 
$_bgcolor1 = "green";
$_bgcolor2 = "#e8ffaf";
if(config('myapp.image_folder') == "/train"){
    $_bgcolor1 = "navy";
    $_bgcolor2 = "#d9e7fb";
}

?>
<div class="center main_img">
	<img src="{{ env('IMAGE_FOLDER') }}/logo_kari.jpg" alt="{{ env('ALT_TEXT') }}">
	{{-- 設定で表示非表示 --}}
</div><!-- class=center -->

