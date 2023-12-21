{{-- アンケート画面 --}}
@extends('layouts.base')

@section('title', 'アンケート')

@section('description')
@endsection

@section('main')
<style>
.questionnaire {
    text-align: initial;
}
</style>
<div class="questionnaire">
{{-- アンケートメイン --}}
{{-- アンケートヘッダ(start) --}}
	<!-- アンケートメイン -->
<table class="sendotted"><tr><td></td></tr></table>
<table class="tah20"><tr><td></td></tr></table>
<table class="tabase">
	<tr>
		<td align="center"><font class="b24">{{$mQuestionnaire->name}}</font></td>
	</tr>
</table>
<table class="tah10"><tr><td></td></tr></table>
<table class="tah5"><tr><td></td></tr></table>

<table class="tabase">
	<tr>
		<td><font color="red">※はご回答必須です。</font></td>
	</tr>
</table>

<table class="tah10"><tr><td></td></tr></table>
<table class="sendotted"><tr><td></td></tr></table>
<table class="tah5"><tr><td></td></tr></table>

{{-- アンケートヘッダ(end) --}}


    {{-- バリデーションメッセージ表示 --}}
    <div id="message">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if ($message)
        <div class="alert alert-danger">
            <ul>
                <li>{{ $message }}</li>
            </ul>
        </div>
    @endif
    </div>

{{-- アンケート(start) --}}
    <form action="{{ url('/questionnaire')}}" method="POST">
        <input type='hidden' name='m_questionnaire_id' value='{{ $mQuestionnaire->id }}'>
        <ul>
        @foreach ($mQuestionnaireQuestions as $mQuestionnaireQuestion)
        	@if ($mQuestionnaireQuestion->sort_no == 16)
        	{{-- 特別処理 Q16 start --}}
            <table class="tabase">
            	<tbody><tr>
            		<td><font class="t14">前問で「ファミリー」「その他」選択者のみ回答</font></td>
            	</tr>
            </tbody></table>
        	{{-- 特別処理 Q16 end --}}
        	@endif
        
            {{-- 質問(start) --}}
            @if ($mQuestionnaireQuestion->sort_no == 19)
        	{{-- 特別処理 Q19 start --}}
            <table class="tabase2">
            	<tbody><tr>
            		<td class="tdbase2">Q{{ $mQuestionnaireQuestion->sort_no }}.{!! $mQuestionnaireQuestion->question !!}
            		@if($mQuestionnaireQuestion->required_flg == 1)
            		<font color="red">※</font></td>
            		@endif
            	</tr>
            </tbody></table>
        	{{-- 特別処理 Q19 else --}}
        	@else
            <table class="tabase2">
            	<tbody><tr>
            		<td class="tdbase2">Q{{ $mQuestionnaireQuestion->sort_no }}.{{ $mQuestionnaireQuestion->question }}
            		@if($mQuestionnaireQuestion->required_flg == 1)
            		<font color="red">※</font></td>
            		@endif
            	</tr>
            </tbody></table>
        	@endif
        	{{-- 特別処理 Q19 end --}}
            <table class="tah5"><tbody><tr><td></td></tr></tbody></table>
            {{-- 質問(end) --}}
            {{--回答(start) --}}
            <table class="tainput"><!-- 回答の最初の class="tainput" -->
            	<tbody><tr>
            		<td>
            @switch($mQuestionnaireQuestion->type)
              @case($MQuestionnaireQuestion::TYPE_TEXT)
                {{-- 回答フォーム TEXT(start) --}}
        		<input type="text" name="{{ $mQuestionnaireQuestion->get_formname() }}" value="{{old($mQuestionnaireQuestion->get_formname())}}"
        		class="input-cl" maxlength="128">
                {{-- 回答フォーム TEXT(end) --}} 
                @break
              @case($MQuestionnaireQuestion::TYPE_TEXTAREA)
                {{-- 回答フォーム TYPE_TEXTAREA(start) --}}
                <textarea name="{{ $mQuestionnaireQuestion->get_formname() }}" 
                 maxlength="512"
                class="input-cl" style="width:100%;font-size:20px" rows="5" 
                >{{old($mQuestionnaireQuestion->get_formname())}}</textarea>
                {{-- 回答フォーム TYPE_TEXTAREA(end) --}} 
                @break
              @case($MQuestionnaireQuestion::TYPE_SELECT)
                {{-- 未対応 --}}
                {{-- 回答フォーム TYPE_SELECT(start) --}}
                @if(isset($mQuestionnaireQuestion->m_questionnaire_question_options))
                @endif
                {{-- 回答フォーム TYPE_SELECT(end) --}} 
                @break
              @case($MQuestionnaireQuestion::TYPE_RADIO)
                {{-- 回答フォーム TYPE_RADIO(start) --}}
                @if(isset($mQuestionnaireQuestion->m_questionnaire_question_options))
                  @foreach ($mQuestionnaireQuestion->m_questionnaire_question_options as $mQuestionnaireQuestionOption)
                    <input type="radio" id="radio{{ $mQuestionnaireQuestionOption->id }}" name="{{ $mQuestionnaireQuestionOption->get_formname() }}" 
                    value="{{ $mQuestionnaireQuestionOption->option_value }}"
                    {{ old($mQuestionnaireQuestionOption->get_formname()) === $mQuestionnaireQuestionOption->option_value ? 'checked' : '' }}>
                    <label for="radio{{ $mQuestionnaireQuestionOption->id }}">{{ $mQuestionnaireQuestionOption->option_label }}</label>
                    <table class="tah5"><tbody><tr><td></td></tr></tbody></table>
                    @if($mQuestionnaireQuestionOption->with_text_flg)
                    <table class="tainput">
                    	<tbody><tr>
                    		<td>
                    		<input type="text" name="{{ $mQuestionnaireQuestionOption->get_exttextformname() }}"  value="{{old($mQuestionnaireQuestionOption->get_exttextformname())}}"
                    		class="input-cl" maxlength="128">
                    		</td>
                    	</tr>
                    </tbody></table>
                    @endif
                  @endforeach
                @endif
                {{-- 回答フォーム TYPE_RADIO(end) --}} 
                @break
              @case($MQuestionnaireQuestion::TYPE_CHECKBOX)
                {{-- 回答フォーム TYPE_CHECKBOX(start) --}} 
                @if(isset($mQuestionnaireQuestion->m_questionnaire_question_options))
                  @foreach ($mQuestionnaireQuestion->m_questionnaire_question_options as $mQuestionnaireQuestionOption)
                    <input type="checkbox" id="checkbox{{$mQuestionnaireQuestionOption->id}}" name={{$mQuestionnaireQuestionOption->get_formname()}} 
                    value="{{$mQuestionnaireQuestionOption->option_value}}"
                    {{ old($mQuestionnaireQuestionOption->get_formname()) === $mQuestionnaireQuestionOption->option_value ? 'checked' : '' }}>
                    <label for="checkbox{{$mQuestionnaireQuestionOption->id}}">{{$mQuestionnaireQuestionOption->sort_no}}.{{$mQuestionnaireQuestionOption->option_label}}</label>
                    <table class="tah5"><tbody><tr><td></td></tr></tbody></table>
                    @if($mQuestionnaireQuestionOption->with_text_flg)
                        <table class="tainput">
                        	<tbody><tr>
                        		<td>
                        		<input type="text" name="{{ $mQuestionnaireQuestionOption->get_exttextformname() }}" value="{{old($mQuestionnaireQuestionOption->get_exttextformname())}}"
                        		class="input-cl" maxlength="128">
                        		</td>
                        	</tr>
                        </tbody></table>
                      
                    @endif
                  @endforeach
                @endif
                {{-- 回答フォーム TYPE_CHECKBOX(end) --}} 
                @break
              @case($MQuestionnaireQuestion::TYPE_SELECT_MULTIPLE)
                {{-- 未対応 --}}
                @if(isset($mQuestionnaireQuestion->m_questionnaire_question_options))
                @endif
                @break
              @default
                不明なタイプが指定されています。
            @endswitch
            </tr>
            </tbody></table><!-- 回答の最初の class="tainput" の閉じ -->
            {{--回答(end) --}}
            {{-- 質問の最後に付ける(start) --}}
            <table class="tah10"><tbody><tr><td></td></tr></tbody></table>
            <table class="sendotted"><tbody><tr><td></td></tr></tbody></table>
            <table class="tah10"><tbody><tr><td></td></tr></tbody></table>
            {{-- 質問の最後に付ける(end) --}}
        @endforeach
        </ul>
        
        {{ csrf_field() }}
        {{-- 完了 --}}
        <div class="button_img_wrapper">
        <table class="tah30"><tbody><tr><td></td></tr></tbody></table>
        <input type="image" src="images{{config('myapp.image_folder')}}/bn_kanryo.png" class="button_img" >
        </div>
    </form>
{{-- アンケート(end) --}}
    {{-- 戻る --}}
    <div class="button_img_wrapper">
    <table class="tah30"><tbody><tr><td></td></tr></tbody></table>
    <a href="{{route('stamp')}}">
    <img src="{{url('images'.config('myapp.image_folder').'/bn_modoru.png')}}" class="button_img" >
    </a>
    </div>

</div><!-- end div class="questionnaire" -->

@endsection