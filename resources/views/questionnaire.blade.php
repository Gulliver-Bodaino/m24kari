{{-- アンケート画面 --}}
@extends('layouts.base')

@section('title', 'アンケート')

@section('main')

<main>
  <p>※は回答必須です。</p>



  <form action="{{ url('/questionnaire')}}" method="POST">
  @csrf
    <ul>
      <!-- アンケート題目 -->
      @foreach($mQuestionnaire as $mQuestionnaire)

      <li class="Q_title">Q{{ $mQuestionnaire->id	}}. {{ $mQuestionnaire->question}} type:{{ $mQuestionnaire->type}} 必須:{{ $mQuestionnaire->required_flg}}

          <!-- アンケート題目に対する質問 -->
          @foreach($mQuestionnaireOption as $item_option)
          
            @if($mQuestionnaire -> id == $item_option -> m_questionnaire_question_id)
              <p>
                <label>
                @if($mQuestionnaire -> type == 1)
                  {{ $item_option->option_value}}.
                  {{ $item_option->option_label}}<br>
                  <input type="text" name="{{ $mQuestionnaire->id}}">

                @elseif($mQuestionnaire -> type == 2)
                  {{ $item_option->option_value}}.
                  {{ $item_option->option_label}}<br>
                  <textarea name="{{ $mQuestionnaire->id}}" value="{{ $item_option->option_label}}" rows="5" maxlength="512"></textarea>

                @elseif($mQuestionnaire -> type == 3)
                  
                  @if( $item_option-> id == 1)
                    <select name="{{ $item_option->option_value}}">
                  @endif
                  
                  <option value="{{ $item_option->id}}">{{ $item_option->option_label}}</option>
                  
                  @if($item_option-> id == 17)
                    </select>
                  @endif

                @elseif($mQuestionnaire -> type == 4)
                  <input type="radio" name="{{ $mQuestionnaire->option_value}}" value="{{ $item_option->option_label}}">
                  {{ $item_option->option_value}}.
                  {{ $item_option->option_label}}

                @elseif($mQuestionnaire -> type == 5)
                  <input type="checkbox" name="{{ $mQuestionnaire->id}}" value="{{ $item_option->option_label}}">
                  {{ $item_option->option_value}}.
                  {{ $item_option->option_label}}

                @elseif($mQuestionnaire -> type == 6)
                
                  @if($loop->first)
                    <select multiple name="{{ $item_option->option_value}}">
                  @endif
                  
                  <option value="{{ $item_option->id}}">{{ $item_option->option_label}}</option>
                  
                  @if($loop->last)
                    </select>
                  @endif

                @endif

                </label>
              </p>
            @endif

          @endforeach
      </li>
      @endforeach
    </ul>
    
    <button type="submit">Submit</button>

  </form>


</main>




@endsection
