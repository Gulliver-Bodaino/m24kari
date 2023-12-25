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
      @foreach($questionnaire as $item)

      <li class="Q_title">Q{{ $item->id	}}. {{ $item->question}} type:{{ $item->type}}
          <!-- アンケート題目に対する質問 -->
          @foreach($option as $item_option)
          
            @if($item -> id == $item_option -> m_questionnaire_question_id)
              <p>
                <label>
                  <input type="radio" name="{{ $item->id}}" value="{{ $item_option->option_label}}">
                  {{ $item_option->option_value}}.
                  {{ $item_option->option_label}}
                  
                </label>
              </p>
            @endif

          @endforeach
      </li>
      @endforeach
    </ul>

  </form>


</main>




@endsection
