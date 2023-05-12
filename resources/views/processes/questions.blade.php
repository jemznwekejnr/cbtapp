@isset($questions[0]->id)
<div class="form-group float-left" id="q1">
      <div id="question"> 
        @if($questions[0]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage0" class="btn btn-info btn-round" onclick="showpassage({!! $questions[0]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id0" id="question_id0" value="{{ $questions[0]->id }}">
        <div class="">
          <input type="hidden" name="questiontype0" id="questiontype0" value="{{ $questions[0]->questiontype }}">
          @if($questions[0]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion0" id="textquestion0" value="{{ $questions[0]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[0]->textquestion }}</strong></p>
          @elseif($questions[0]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion0" id="textquestion0" value="{{ $questions[0]->textquestion }}">
          <input type="hidden" name="imagequestion0" id="imagequestion0" value="{{ $questions[0]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[0]->textquestion }}<br /><img src="{{ asset($questions[0]->imagequestion) }}" ></strong></p>
          @elseif($questions[0]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion0" id="imagequestion0" value="{{ $questions[0]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[0]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number0" id="number01" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[0]->option1type == 'Text Only')
        <strong>{{ $questions[0]->option1text }}</strong>
        @elseif($questions[0]->option1type == 'Text and Image')
        <strong>{{ $questions[0]->option1text }}<br /><img src="{{ asset($questions[0]->option1image) }}"></strong>
        @elseif($questions[0]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[0]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number0" id="number02" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[0]->option2type == 'Text Only')
        <strong>{{ $questions[0]->option2text }}</strong>
        @elseif($questions[0]->option2type == 'Text and Image')
        <strong>{{ $questions[0]->option2text }}<br /><img src="{{ asset($questions[0]->option2image) }}"></strong>
        @elseif($questions[0]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[0]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[0]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number0" id="number03" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[0]->option3type == 'Text Only')
        <strong>{{ $questions[0]->option3text }}</strong>
        @elseif($questions[0]->option3type == 'Text and Image')
        <strong>{{ $questions[0]->option3text }}<br /><img src="{{ asset($questions[0]->option3image) }}"></strong>
        @elseif($questions[0]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[0]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[0]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number0" id="number04" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[0]->option4type == 'Text Only')
        <strong>{{ $questions[0]->option4text }}</strong>
        @elseif($questions[0]->option4type == 'Text and Image')
        <strong>{{ $questions[0]->option4text }}<br /><img src="{{ asset($questions[0]->option4image) }}"></strong>
        @elseif($questions[0]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[0]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[1]->id)
<div class="form-group float-left" id="q2">
      <div id="question"> 
        @if($questions[1]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage1" class="btn btn-info btn-round" onclick="showpassage({!! $questions[1]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id1" id="question_id1" value="{{ $questions[1]->id }}">
        <div class="">
          <input type="hidden" name="questiontype1" id="questiontype1" value="{{ $questions[1]->questiontype }}">
          @if($questions[1]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion1" id="textquestion1" value="{{ $questions[1]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[1]->textquestion }}</strong></p>
          @elseif($questions[1]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion1" id="textquestion1" value="{{ $questions[1]->textquestion }}">
          <input type="hidden" name="imagequestion1" id="imagequestion1" value="{{ $questions[1]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[1]->textquestion }}<br /><img src="{{ asset($questions[1]->imagequestion) }}" ></strong></p>
          @elseif($questions[1]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion1" id="imagequestion1" value="{{ $questions[1]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[1]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number1" id="number11" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[1]->option1type == 'Text Only')
        <strong>{{ $questions[1]->option1text }}</strong>
        @elseif($questions[1]->option1type == 'Text and Image')
        <strong>{{ $questions[1]->option1text }}<br /><img src="{{ asset($questions[1]->option1image) }}"></strong>
        @elseif($questions[1]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[1]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number1" id="number12" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[1]->option2type == 'Text Only')
        <strong>{{ $questions[1]->option2text }}</strong>
        @elseif($questions[1]->option2type == 'Text and Image')
        <strong>{{ $questions[1]->option2text }}<br /><img src="{{ asset($questions[1]->option2image) }}"></strong>
        @elseif($questions[1]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[1]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[1]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number1" id="number13" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[1]->option3type == 'Text Only')
        <strong>{{ $questions[1]->option3text }}</strong>
        @elseif($questions[1]->option3type == 'Text and Image')
        <strong>{{ $questions[1]->option3text }}<br /><img src="{{ asset($questions[1]->option3image) }}"></strong>
        @elseif($questions[1]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[1]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[1]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number1" id="number14" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[1]->option4type == 'Text Only')
        <strong>{{ $questions[1]->option4text }}</strong>
        @elseif($questions[1]->option4type == 'Text and Image')
        <strong>{{ $questions[1]->option4text }}<br /><img src="{{ asset($questions[1]->option4image) }}"></strong>
        @elseif($questions[1]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[1]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[2]->id)
<div class="form-group float-left" id="q3">
      <div id="question"> 
        @if($questions[2]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage2" class="btn btn-info btn-round" onclick="showpassage({!! $questions[2]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id2" id="question_id2" value="{{ $questions[2]->id }}">
        <div class="">
          <input type="hidden" name="questiontype2" id="questiontype2" value="{{ $questions[2]->questiontype }}">
          @if($questions[2]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion2" id="textquestion2" value="{{ $questions[2]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[2]->textquestion }}</strong></p>
          @elseif($questions[2]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion2" id="textquestion2" value="{{ $questions[2]->textquestion }}">
          <input type="hidden" name="imagequestion2" id="imagequestion2" value="{{ $questions[2]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[2]->textquestion }}<br /><img src="{{ asset($questions[2]->imagequestion) }}" ></strong></p>
          @elseif($questions[2]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion2" id="imagequestion2" value="{{ $questions[2]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[2]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number2" id="number21" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[2]->option1type == 'Text Only')
        <strong>{{ $questions[2]->option1text }}</strong>
        @elseif($questions[2]->option1type == 'Text and Image')
        <strong>{{ $questions[2]->option1text }}<br /><img src="{{ asset($questions[2]->option1image) }}"></strong>
        @elseif($questions[2]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[2]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number2" id="number22" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[2]->option2type == 'Text Only')
        <strong>{{ $questions[2]->option2text }}</strong>
        @elseif($questions[2]->option2type == 'Text and Image')
        <strong>{{ $questions[2]->option2text }}<br /><img src="{{ asset($questions[2]->option2image) }}"></strong>
        @elseif($questions[2]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[2]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[2]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number2" id="number23" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[2]->option3type == 'Text Only')
        <strong>{{ $questions[2]->option3text }}</strong>
        @elseif($questions[2]->option3type == 'Text and Image')
        <strong>{{ $questions[2]->option3text }}<br /><img src="{{ asset($questions[2]->option3image) }}"></strong>
        @elseif($questions[2]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[2]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[2]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number2" id="number24" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[2]->option4type == 'Text Only')
        <strong>{{ $questions[2]->option4text }}</strong>
        @elseif($questions[2]->option4type == 'Text and Image')
        <strong>{{ $questions[2]->option4text }}<br /><img src="{{ asset($questions[2]->option4image) }}"></strong>
        @elseif($questions[2]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[2]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset



@isset($questions[3]->id)
<div class="form-group float-left" id="q4">
      <div id="question"> 
        @if($questions[3]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage3" class="btn btn-info btn-round" onclick="showpassage({!! $questions[3]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id3" id="question_id3" value="{{ $questions[3]->id }}">
        <div class="">
          <input type="hidden" name="questiontype3" id="questiontype3" value="{{ $questions[3]->questiontype }}">
          @if($questions[3]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion3" id="textquestion3" value="{{ $questions[3]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[3]->textquestion }}</strong></p>
          @elseif($questions[3]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion3" id="textquestion3" value="{{ $questions[3]->textquestion }}">
          <input type="hidden" name="imagequestion3" id="imagequestion3" value="{{ $questions[3]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[3]->textquestion }}<br /><img src="{{ asset($questions[3]->imagequestion) }}" ></strong></p>
          @elseif($questions[3]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion3" id="imagequestion3" value="{{ $questions[3]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[3]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number3" id="number31" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[3]->option1type == 'Text Only')
        <strong>{{ $questions[3]->option1text }}</strong>
        @elseif($questions[3]->option1type == 'Text and Image')
        <strong>{{ $questions[3]->option1text }}<br /><img src="{{ asset($questions[3]->option1image) }}"></strong>
        @elseif($questions[3]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[3]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number3" id="number32" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[3]->option2type == 'Text Only')
        <strong>{{ $questions[3]->option2text }}</strong>
        @elseif($questions[3]->option2type == 'Text and Image')
        <strong>{{ $questions[3]->option2text }}<br /><img src="{{ asset($questions[3]->option2image) }}"></strong>
        @elseif($questions[3]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[3]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[3]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number3" id="number33" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[3]->option3type == 'Text Only')
        <strong>{{ $questions[3]->option3text }}</strong>
        @elseif($questions[3]->option3type == 'Text and Image')
        <strong>{{ $questions[3]->option3text }}<br /><img src="{{ asset($questions[3]->option3image) }}"></strong>
        @elseif($questions[3]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[3]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[3]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number3" id="number34" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[3]->option4type == 'Text Only')
        <strong>{{ $questions[3]->option4text }}</strong>
        @elseif($questions[3]->option4type == 'Text and Image')
        <strong>{{ $questions[3]->option4text }}<br /><img src="{{ asset($questions[3]->option4image) }}"></strong>
        @elseif($questions[3]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[3]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[4]->id)
<div class="form-group float-left" id="q5">
      <div id="question"> 
        @if($questions[4]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage4" class="btn btn-info btn-round" onclick="showpassage({!! $questions[4]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id4" id="question_id4" value="{{ $questions[4]->id }}">
        <div class="">
          <input type="hidden" name="questiontype4" id="questiontype4" value="{{ $questions[4]->questiontype }}">
          @if($questions[4]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion4" id="textquestion4" value="{{ $questions[4]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[4]->textquestion }}</strong></p>
          @elseif($questions[4]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion4" id="textquestion4" value="{{ $questions[4]->textquestion }}">
          <input type="hidden" name="imagequestion4" id="imagequestion4" value="{{ $questions[4]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[4]->textquestion }}<br /><img src="{{ asset($questions[4]->imagequestion) }}" ></strong></p>
          @elseif($questions[4]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion4" id="imagequestion4" value="{{ $questions[4]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[4]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number4" id="number41" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[4]->option1type == 'Text Only')
        <strong>{{ $questions[4]->option1text }}</strong>
        @elseif($questions[4]->option1type == 'Text and Image')
        <strong>{{ $questions[4]->option1text }}<br /><img src="{{ asset($questions[4]->option1image) }}"></strong>
        @elseif($questions[4]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[4]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number4" id="number42" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[4]->option2type == 'Text Only')
        <strong>{{ $questions[4]->option2text }}</strong>
        @elseif($questions[4]->option2type == 'Text and Image')
        <strong>{{ $questions[4]->option2text }}<br /><img src="{{ asset($questions[4]->option2image) }}"></strong>
        @elseif($questions[4]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[4]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[4]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number4" id="number43" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[4]->option3type == 'Text Only')
        <strong>{{ $questions[4]->option3text }}</strong>
        @elseif($questions[4]->option3type == 'Text and Image')
        <strong>{{ $questions[4]->option3text }}<br /><img src="{{ asset($questions[4]->option3image) }}"></strong>
        @elseif($questions[4]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[4]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[4]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number4" id="number44" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[4]->option4type == 'Text Only')
        <strong>{{ $questions[4]->option4text }}</strong>
        @elseif($questions[4]->option4type == 'Text and Image')
        <strong>{{ $questions[4]->option4text }}<br /><img src="{{ asset($questions[4]->option4image) }}"></strong>
        @elseif($questions[4]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[4]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[5]->id)
<div class="form-group float-left" id="q6">
      <div id="question"> 
        @if($questions[5]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage5" class="btn btn-info btn-round" onclick="showpassage({!! $questions[5]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id5" id="question_id5" value="{{ $questions[5]->id }}">
        <div class="">
          <input type="hidden" name="questiontype5" id="questiontype5" value="{{ $questions[5]->questiontype }}">
          @if($questions[5]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion5" id="textquestion5" value="{{ $questions[5]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[5]->textquestion }}</strong></p>
          @elseif($questions[5]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion5" id="textquestion5" value="{{ $questions[5]->textquestion }}">
          <input type="hidden" name="imagequestion5" id="imagequestion5" value="{{ $questions[5]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[5]->textquestion }}<br /><img src="{{ asset($questions[5]->imagequestion) }}" ></strong></p>
          @elseif($questions[5]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion5" id="imagequestion5" value="{{ $questions[5]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[5]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number5" id="number51" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[5]->option1type == 'Text Only')
        <strong>{{ $questions[5]->option1text }}</strong>
        @elseif($questions[5]->option1type == 'Text and Image')
        <strong>{{ $questions[5]->option1text }}<br /><img src="{{ asset($questions[5]->option1image) }}"></strong>
        @elseif($questions[5]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[5]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number5" id="number52" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[5]->option2type == 'Text Only')
        <strong>{{ $questions[5]->option2text }}</strong>
        @elseif($questions[5]->option2type == 'Text and Image')
        <strong>{{ $questions[5]->option2text }}<br /><img src="{{ asset($questions[5]->option2image) }}"></strong>
        @elseif($questions[5]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[5]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[5]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number5" id="number53" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[5]->option3type == 'Text Only')
        <strong>{{ $questions[5]->option3text }}</strong>
        @elseif($questions[5]->option3type == 'Text and Image')
        <strong>{{ $questions[5]->option3text }}<br /><img src="{{ asset($questions[5]->option3image) }}"></strong>
        @elseif($questions[5]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[5]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[5]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number5" id="number54" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[5]->option4type == 'Text Only')
        <strong>{{ $questions[5]->option4text }}</strong>
        @elseif($questions[5]->option4type == 'Text and Image')
        <strong>{{ $questions[5]->option4text }}<br /><img src="{{ asset($questions[5]->option4image) }}"></strong>
        @elseif($questions[5]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[5]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[6]->id)
<div class="form-group float-left" id="q7">
      <div id="question"> 
        @if($questions[6]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage6" class="btn btn-info btn-round" onclick="showpassage({!! $questions[6]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id6" id="question_id6" value="{{ $questions[6]->id }}">
        <div class="">
          <input type="hidden" name="questiontype6" id="questiontype6" value="{{ $questions[6]->questiontype }}">
          @if($questions[6]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion6" id="textquestion6" value="{{ $questions[6]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[6]->textquestion }}</strong></p>
          @elseif($questions[6]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion6" id="textquestion6" value="{{ $questions[6]->textquestion }}">
          <input type="hidden" name="imagequestion6" id="imagequestion6" value="{{ $questions[6]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[6]->textquestion }}<br /><img src="{{ asset($questions[6]->imagequestion) }}" ></strong></p>
          @elseif($questions[6]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion6" id="imagequestion6" value="{{ $questions[6]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[6]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number6" id="number61" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[6]->option1type == 'Text Only')
        <strong>{{ $questions[6]->option1text }}</strong>
        @elseif($questions[6]->option1type == 'Text and Image')
        <strong>{{ $questions[6]->option1text }}<br /><img src="{{ asset($questions[6]->option1image) }}"></strong>
        @elseif($questions[6]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[6]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number6" id="number62" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[6]->option2type == 'Text Only')
        <strong>{{ $questions[6]->option2text }}</strong>
        @elseif($questions[6]->option2type == 'Text and Image')
        <strong>{{ $questions[6]->option2text }}<br /><img src="{{ asset($questions[6]->option2image) }}"></strong>
        @elseif($questions[6]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[6]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[6]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number6" id="number63" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[6]->option3type == 'Text Only')
        <strong>{{ $questions[6]->option3text }}</strong>
        @elseif($questions[6]->option3type == 'Text and Image')
        <strong>{{ $questions[6]->option3text }}<br /><img src="{{ asset($questions[6]->option3image) }}"></strong>
        @elseif($questions[6]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[6]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[6]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number6" id="number64" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[6]->option4type == 'Text Only')
        <strong>{{ $questions[6]->option4text }}</strong>
        @elseif($questions[6]->option4type == 'Text and Image')
        <strong>{{ $questions[6]->option4text }}<br /><img src="{{ asset($questions[6]->option4image) }}"></strong>
        @elseif($questions[6]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[5]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[7]->id)
<div class="form-group float-left" id="q8">
      <div id="question"> 
        @if($questions[7]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage7" class="btn btn-info btn-round" onclick="showpassage({!! $questions[7]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id7" id="question_id7" value="{{ $questions[7]->id }}">
        <div class="">
          <input type="hidden" name="questiontype7" id="questiontype7" value="{{ $questions[7]->questiontype }}">
          @if($questions[7]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion7" id="textquestion7" value="{{ $questions[7]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[7]->textquestion }}</strong></p>
          @elseif($questions[7]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion7" id="textquestion7" value="{{ $questions[7]->textquestion }}">
          <input type="hidden" name="imagequestion7" id="imagequestion7" value="{{ $questions[7]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[7]->textquestion }}<br /><img src="{{ asset($questions[7]->imagequestion) }}" ></strong></p>
          @elseif($questions[7]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion7" id="imagequestion7" value="{{ $questions[7]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[7]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number7" id="number71" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[7]->option1type == 'Text Only')
        <strong>{{ $questions[7]->option1text }}</strong>
        @elseif($questions[7]->option1type == 'Text and Image')
        <strong>{{ $questions[7]->option1text }}<br /><img src="{{ asset($questions[7]->option1image) }}"></strong>
        @elseif($questions[7]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[7]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number7" id="number72" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[7]->option2type == 'Text Only')
        <strong>{{ $questions[7]->option2text }}</strong>
        @elseif($questions[7]->option2type == 'Text and Image')
        <strong>{{ $questions[7]->option2text }}<br /><img src="{{ asset($questions[7]->option2image) }}"></strong>
        @elseif($questions[7]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[7]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[7]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number7" id="number73" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[7]->option3type == 'Text Only')
        <strong>{{ $questions[7]->option3text }}</strong>
        @elseif($questions[7]->option3type == 'Text and Image')
        <strong>{{ $questions[7]->option3text }}<br /><img src="{{ asset($questions[7]->option3image) }}"></strong>
        @elseif($questions[7]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[7]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[7]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number7" id="number74" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[7]->option4type == 'Text Only')
        <strong>{{ $questions[7]->option4text }}</strong>
        @elseif($questions[7]->option4type == 'Text and Image')
        <strong>{{ $questions[7]->option4text }}<br /><img src="{{ asset($questions[7]->option4image) }}"></strong>
        @elseif($questions[7]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[7]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[8]->id)
<div class="form-group float-left" id="q9">
      <div id="question"> 
        @if($questions[8]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage8" class="btn btn-info btn-round" onclick="showpassage({!! $questions[8]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id8" id="question_id8" value="{{ $questions[8]->id }}">
        <div class="">
          <input type="hidden" name="questiontype8" id="questiontype8" value="{{ $questions[8]->questiontype }}">
          @if($questions[8]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion8" id="textquestion8" value="{{ $questions[8]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[8]->textquestion }}</strong></p>
          @elseif($questions[8]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion8" id="textquestion8" value="{{ $questions[8]->textquestion }}">
          <input type="hidden" name="imagequestion8" id="imagequestion8" value="{{ $questions[8]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[8]->textquestion }}<br /><img src="{{ asset($questions[8]->imagequestion) }}" ></strong></p>
          @elseif($questions[8]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion8" id="imagequestion8" value="{{ $questions[8]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[8]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number8" id="number81" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[8]->option1type == 'Text Only')
        <strong>{{ $questions[8]->option1text }}</strong>
        @elseif($questions[8]->option1type == 'Text and Image')
        <strong>{{ $questions[8]->option1text }}<br /><img src="{{ asset($questions[8]->option1image) }}"></strong>
        @elseif($questions[8]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[8]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number8" id="number82" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[8]->option2type == 'Text Only')
        <strong>{{ $questions[8]->option2text }}</strong>
        @elseif($questions[8]->option2type == 'Text and Image')
        <strong>{{ $questions[8]->option2text }}<br /><img src="{{ asset($questions[8]->option2image) }}"></strong>
        @elseif($questions[8]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[8]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[8]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number8" id="number83" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[8]->option3type == 'Text Only')
        <strong>{{ $questions[8]->option3text }}</strong>
        @elseif($questions[8]->option3type == 'Text and Image')
        <strong>{{ $questions[8]->option3text }}<br /><img src="{{ asset($questions[8]->option3image) }}"></strong>
        @elseif($questions[8]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[8]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[8]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number8" id="number84" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[8]->option4type == 'Text Only')
        <strong>{{ $questions[8]->option4text }}</strong>
        @elseif($questions[8]->option4type == 'Text and Image')
        <strong>{{ $questions[8]->option4text }}<br /><img src="{{ asset($questions[8]->option4image) }}"></strong>
        @elseif($questions[8]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[8]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset



@isset($questions[9]->id)
<div class="form-group float-left" id="q10">
      <div id="question"> 
        @if($questions[9]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage9" class="btn btn-info btn-round" onclick="showpassage({!! $questions[9]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id9" id="question_id9" value="{{ $questions[9]->id }}">
        <div class="">
          <input type="hidden" name="questiontype9" id="questiontype9" value="{{ $questions[9]->questiontype }}">
          @if($questions[9]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion9" id="textquestion9" value="{{ $questions[9]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[9]->textquestion }}</strong></p>
          @elseif($questions[9]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion9" id="textquestion9" value="{{ $questions[9]->textquestion }}">
          <input type="hidden" name="imagequestion9" id="imagequestion9" value="{{ $questions[9]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[9]->textquestion }}<br /><img src="{{ asset($questions[9]->imagequestion) }}" ></strong></p>
          @elseif($questions[9]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion9" id="imagequestion9" value="{{ $questions[9]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[9]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number9" id="number91" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[9]->option1type == 'Text Only')
        <strong>{{ $questions[9]->option1text }}</strong>
        @elseif($questions[9]->option1type == 'Text and Image')
        <strong>{{ $questions[9]->option1text }}<br /><img src="{{ asset($questions[9]->option1image) }}"></strong>
        @elseif($questions[9]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[9]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number9" id="number92" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[9]->option2type == 'Text Only')
        <strong>{{ $questions[9]->option2text }}</strong>
        @elseif($questions[9]->option2type == 'Text and Image')
        <strong>{{ $questions[9]->option2text }}<br /><img src="{{ asset($questions[9]->option2image) }}"></strong>
        @elseif($questions[9]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[9]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[9]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number9" id="number93" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[9]->option3type == 'Text Only')
        <strong>{{ $questions[9]->option3text }}</strong>
        @elseif($questions[9]->option3type == 'Text and Image')
        <strong>{{ $questions[9]->option3text }}<br /><img src="{{ asset($questions[9]->option3image) }}"></strong>
        @elseif($questions[9]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[9]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[9]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number9" id="number94" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[9]->option4type == 'Text Only')
        <strong>{{ $questions[9]->option4text }}</strong>
        @elseif($questions[9]->option4type == 'Text and Image')
        <strong>{{ $questions[9]->option4text }}<br /><img src="{{ asset($questions[9]->option4image) }}"></strong>
        @elseif($questions[9]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[9]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset



@isset($questions[10]->id)
<div class="form-group float-left" id="q11">
      <div id="question"> 
        @if($questions[10]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage10" class="btn btn-info btn-round" onclick="showpassage({!! $questions[10]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id10" id="question_id10" value="{{ $questions[10]->id }}">
        <div class="">
          <input type="hidden" name="questiontype10" id="questiontype10" value="{{ $questions[10]->questiontype }}">
          @if($questions[10]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion10" id="textquestion10" value="{{ $questions[10]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[10]->textquestion }}</strong></p>
          @elseif($questions[10]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion10" id="textquestion10" value="{{ $questions[10]->textquestion }}">
          <input type="hidden" name="imagequestion10" id="imagequestion10" value="{{ $questions[10]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[10]->textquestion }}<br /><img src="{{ asset($questions[10]->imagequestion) }}" ></strong></p>
          @elseif($questions[10]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion10" id="imagequestion10" value="{{ $questions[10]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[10]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number10" id="number101" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[10]->option1type == 'Text Only')
        <strong>{{ $questions[10]->option1text }}</strong>
        @elseif($questions[10]->option1type == 'Text and Image')
        <strong>{{ $questions[10]->option1text }}<br /><img src="{{ asset($questions[10]->option1image) }}"></strong>
        @elseif($questions[10]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[10]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number10" id="number102" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[10]->option2type == 'Text Only')
        <strong>{{ $questions[10]->option2text }}</strong>
        @elseif($questions[10]->option2type == 'Text and Image')
        <strong>{{ $questions[10]->option2text }}<br /><img src="{{ asset($questions[10]->option2image) }}"></strong>
        @elseif($questions[10]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[10]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[10]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number10" id="number103" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[10]->option3type == 'Text Only')
        <strong>{{ $questions[10]->option3text }}</strong>
        @elseif($questions[10]->option3type == 'Text and Image')
        <strong>{{ $questions[10]->option3text }}<br /><img src="{{ asset($questions[10]->option3image) }}"></strong>
        @elseif($questions[10]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[10]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[10]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number10" id="number104" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[10]->option4type == 'Text Only')
        <strong>{{ $questions[10]->option4text }}</strong>
        @elseif($questions[10]->option4type == 'Text and Image')
        <strong>{{ $questions[10]->option4text }}<br /><img src="{{ asset($questions[10]->option4image) }}"></strong>
        @elseif($questions[10]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[10]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[11]->id)
<div class="form-group float-left" id="q12">
      <div id="question"> 
        @if($questions[11]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage11" class="btn btn-info btn-round" onclick="showpassage({!! $questions[11]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id11" id="question_id11" value="{{ $questions[11]->id }}">
        <div class="">
          <input type="hidden" name="questiontype11" id="questiontype11" value="{{ $questions[11]->questiontype }}">
          @if($questions[11]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion11" id="textquestion11" value="{{ $questions[11]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[11]->textquestion }}</strong></p>
          @elseif($questions[11]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion11" id="textquestion11" value="{{ $questions[11]->textquestion }}">
          <input type="hidden" name="imagequestion11" id="imagequestion11" value="{{ $questions[11]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[11]->textquestion }}<br /><img src="{{ asset($questions[11]->imagequestion) }}" ></strong></p>
          @elseif($questions[11]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion11" id="imagequestion11" value="{{ $questions[11]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[11]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number11" id="number111" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[11]->option1type == 'Text Only')
        <strong>{{ $questions[11]->option1text }}</strong>
        @elseif($questions[11]->option1type == 'Text and Image')
        <strong>{{ $questions[11]->option1text }}<br /><img src="{{ asset($questions[11]->option1image) }}"></strong>
        @elseif($questions[11]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[11]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number11" id="number112" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[11]->option2type == 'Text Only')
        <strong>{{ $questions[11]->option2text }}</strong>
        @elseif($questions[11]->option2type == 'Text and Image')
        <strong>{{ $questions[11]->option2text }}<br /><img src="{{ asset($questions[11]->option2image) }}"></strong>
        @elseif($questions[11]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[11]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[11]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number11" id="number113" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[11]->option3type == 'Text Only')
        <strong>{{ $questions[11]->option3text }}</strong>
        @elseif($questions[11]->option3type == 'Text and Image')
        <strong>{{ $questions[11]->option3text }}<br /><img src="{{ asset($questions[11]->option3image) }}"></strong>
        @elseif($questions[11]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[11]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[11]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number11" id="number114" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[11]->option4type == 'Text Only')
        <strong>{{ $questions[11]->option4text }}</strong>
        @elseif($questions[11]->option4type == 'Text and Image')
        <strong>{{ $questions[11]->option4text }}<br /><img src="{{ asset($questions[11]->option4image) }}"></strong>
        @elseif($questions[11]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[11]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[12]->id)
<div class="form-group float-left" id="q13">
      <div id="question"> 
        @if($questions[12]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage12" class="btn btn-info btn-round" onclick="showpassage({!! $questions[12]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id12" id="question_id12" value="{{ $questions[12]->id }}">
        <div class="">
          <input type="hidden" name="questiontype12" id="questiontype12" value="{{ $questions[12]->questiontype }}">
          @if($questions[12]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion12" id="textquestion12" value="{{ $questions[12]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[12]->textquestion }}</strong></p>
          @elseif($questions[12]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion12" id="textquestion12" value="{{ $questions[12]->textquestion }}">
          <input type="hidden" name="imagequestion12" id="imagequestion12" value="{{ $questions[12]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[12]->textquestion }}<br /><img src="{{ asset($questions[12]->imagequestion) }}" ></strong></p>
          @elseif($questions[12]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion12" id="imagequestion12" value="{{ $questions[12]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[12]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number12" id="number121" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[12]->option1type == 'Text Only')
        <strong>{{ $questions[12]->option1text }}</strong>
        @elseif($questions[12]->option1type == 'Text and Image')
        <strong>{{ $questions[12]->option1text }}<br /><img src="{{ asset($questions[12]->option1image) }}"></strong>
        @elseif($questions[12]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[12]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number12" id="number122" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[12]->option2type == 'Text Only')
        <strong>{{ $questions[12]->option2text }}</strong>
        @elseif($questions[12]->option2type == 'Text and Image')
        <strong>{{ $questions[12]->option2text }}<br /><img src="{{ asset($questions[12]->option2image) }}"></strong>
        @elseif($questions[12]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[12]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[12]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number12" id="number123" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[12]->option3type == 'Text Only')
        <strong>{{ $questions[12]->option3text }}</strong>
        @elseif($questions[12]->option3type == 'Text and Image')
        <strong>{{ $questions[12]->option3text }}<br /><img src="{{ asset($questions[12]->option3image) }}"></strong>
        @elseif($questions[12]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[12]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[12]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number12" id="number124" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[12]->option4type == 'Text Only')
        <strong>{{ $questions[12]->option4text }}</strong>
        @elseif($questions[12]->option4type == 'Text and Image')
        <strong>{{ $questions[12]->option4text }}<br /><img src="{{ asset($questions[12]->option4image) }}"></strong>
        @elseif($questions[12]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[12]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[13]->id)
<div class="form-group float-left" id="q14">
      <div id="question"> 
        @if($questions[13]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage13" class="btn btn-info btn-round" onclick="showpassage({!! $questions[13]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id13" id="question_id13" value="{{ $questions[13]->id }}">
        <div class="">
          <input type="hidden" name="questiontype13" id="questiontype13" value="{{ $questions[13]->questiontype }}">
          @if($questions[13]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion13" id="textquestion13" value="{{ $questions[13]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[13]->textquestion }}</strong></p>
          @elseif($questions[13]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion13" id="textquestion13" value="{{ $questions[13]->textquestion }}">
          <input type="hidden" name="imagequestion13" id="imagequestion13" value="{{ $questions[13]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[13]->textquestion }}<br /><img src="{{ asset($questions[13]->imagequestion) }}" ></strong></p>
          @elseif($questions[13]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion13" id="imagequestion13" value="{{ $questions[13]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[13]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number13" id="number131" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[13]->option1type == 'Text Only')
        <strong>{{ $questions[13]->option1text }}</strong>
        @elseif($questions[13]->option1type == 'Text and Image')
        <strong>{{ $questions[13]->option1text }}<br /><img src="{{ asset($questions[13]->option1image) }}"></strong>
        @elseif($questions[13]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[13]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number13" id="number132" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[13]->option2type == 'Text Only')
        <strong>{{ $questions[13]->option2text }}</strong>
        @elseif($questions[13]->option2type == 'Text and Image')
        <strong>{{ $questions[13]->option2text }}<br /><img src="{{ asset($questions[13]->option2image) }}"></strong>
        @elseif($questions[13]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[13]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[13]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number13" id="number133" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[13]->option3type == 'Text Only')
        <strong>{{ $questions[13]->option3text }}</strong>
        @elseif($questions[13]->option3type == 'Text and Image')
        <strong>{{ $questions[13]->option3text }}<br /><img src="{{ asset($questions[13]->option3image) }}"></strong>
        @elseif($questions[13]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[13]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[13]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number13" id="number134" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[13]->option4type == 'Text Only')
        <strong>{{ $questions[13]->option4text }}</strong>
        @elseif($questions[13]->option4type == 'Text and Image')
        <strong>{{ $questions[13]->option4text }}<br /><img src="{{ asset($questions[13]->option4image) }}"></strong>
        @elseif($questions[13]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[13]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset



@isset($questions[14]->id)
<div class="form-group float-left" id="q15">
      <div id="question"> 
        @if($questions[14]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage14" class="btn btn-info btn-round" onclick="showpassage({!! $questions[14]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id14" id="question_id14" value="{{ $questions[14]->id }}">
        <div class="">
          <input type="hidden" name="questiontype14" id="questiontype14" value="{{ $questions[14]->questiontype }}">
          @if($questions[14]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion14" id="textquestion14" value="{{ $questions[14]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[14]->textquestion }}</strong></p>
          @elseif($questions[14]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion14" id="textquestion14" value="{{ $questions[14]->textquestion }}">
          <input type="hidden" name="imagequestion14" id="imagequestion14" value="{{ $questions[14]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[14]->textquestion }}<br /><img src="{{ asset($questions[14]->imagequestion) }}" ></strong></p>
          @elseif($questions[14]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion14" id="imagequestion14" value="{{ $questions[14]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[14]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number14" id="number141" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[14]->option1type == 'Text Only')
        <strong>{{ $questions[14]->option1text }}</strong>
        @elseif($questions[14]->option1type == 'Text and Image')
        <strong>{{ $questions[14]->option1text }}<br /><img src="{{ asset($questions[14]->option1image) }}"></strong>
        @elseif($questions[14]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[14]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number14" id="number142" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[14]->option2type == 'Text Only')
        <strong>{{ $questions[14]->option2text }}</strong>
        @elseif($questions[14]->option2type == 'Text and Image')
        <strong>{{ $questions[14]->option2text }}<br /><img src="{{ asset($questions[14]->option2image) }}"></strong>
        @elseif($questions[14]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[14]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[14]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number14" id="number143" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[14]->option3type == 'Text Only')
        <strong>{{ $questions[14]->option3text }}</strong>
        @elseif($questions[14]->option3type == 'Text and Image')
        <strong>{{ $questions[14]->option3text }}<br /><img src="{{ asset($questions[14]->option3image) }}"></strong>
        @elseif($questions[14]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[14]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[14]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number14" id="number144" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[14]->option4type == 'Text Only')
        <strong>{{ $questions[14]->option4text }}</strong>
        @elseif($questions[14]->option4type == 'Text and Image')
        <strong>{{ $questions[14]->option4text }}<br /><img src="{{ asset($questions[14]->option4image) }}"></strong>
        @elseif($questions[14]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[14]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[15]->id)
<div class="form-group float-left" id="q16">
      <div id="question"> 
        @if($questions[15]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage15" class="btn btn-info btn-round" onclick="showpassage({!! $questions[15]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id15" id="question_id15" value="{{ $questions[15]->id }}">
        <div class="">
          <input type="hidden" name="questiontype15" id="questiontype15" value="{{ $questions[15]->questiontype }}">
          @if($questions[15]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion15" id="textquestion15" value="{{ $questions[15]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[15]->textquestion }}</strong></p>
          @elseif($questions[15]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion15" id="textquestion15" value="{{ $questions[15]->textquestion }}">
          <input type="hidden" name="imagequestion15" id="imagequestion15" value="{{ $questions[15]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[15]->textquestion }}<br /><img src="{{ asset($questions[15]->imagequestion) }}" ></strong></p>
          @elseif($questions[15]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion15" id="imagequestion15" value="{{ $questions[15]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[15]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number15" id="number151" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[15]->option1type == 'Text Only')
        <strong>{{ $questions[15]->option1text }}</strong>
        @elseif($questions[15]->option1type == 'Text and Image')
        <strong>{{ $questions[15]->option1text }}<br /><img src="{{ asset($questions[15]->option1image) }}"></strong>
        @elseif($questions[15]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[15]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number15" id="number152" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[15]->option2type == 'Text Only')
        <strong>{{ $questions[15]->option2text }}</strong>
        @elseif($questions[15]->option2type == 'Text and Image')
        <strong>{{ $questions[15]->option2text }}<br /><img src="{{ asset($questions[15]->option2image) }}"></strong>
        @elseif($questions[15]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[15]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[15]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number15" id="number153" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[15]->option3type == 'Text Only')
        <strong>{{ $questions[15]->option3text }}</strong>
        @elseif($questions[15]->option3type == 'Text and Image')
        <strong>{{ $questions[15]->option3text }}<br /><img src="{{ asset($questions[15]->option3image) }}"></strong>
        @elseif($questions[15]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[15]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[15]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number15" id="number154" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[15]->option4type == 'Text Only')
        <strong>{{ $questions[15]->option4text }}</strong>
        @elseif($questions[15]->option4type == 'Text and Image')
        <strong>{{ $questions[15]->option4text }}<br /><img src="{{ asset($questions[15]->option4image) }}"></strong>
        @elseif($questions[15]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[15]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset



@isset($questions[16]->id)
<div class="form-group float-left" id="q17">
      <div id="question"> 
        @if($questions[16]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage16" class="btn btn-info btn-round" onclick="showpassage({!! $questions[16]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id16" id="question_id16" value="{{ $questions[16]->id }}">
        <div class="">
          <input type="hidden" name="questiontype16" id="questiontype16" value="{{ $questions[16]->questiontype }}">
          @if($questions[16]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion16" id="textquestion16" value="{{ $questions[16]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[16]->textquestion }}</strong></p>
          @elseif($questions[16]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion16" id="textquestion16" value="{{ $questions[16]->textquestion }}">
          <input type="hidden" name="imagequestion16" id="imagequestion16" value="{{ $questions[16]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[16]->textquestion }}<br /><img src="{{ asset($questions[16]->imagequestion) }}" ></strong></p>
          @elseif($questions[16]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion16" id="imagequestion16" value="{{ $questions[16]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[16]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number16" id="number161" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[16]->option1type == 'Text Only')
        <strong>{{ $questions[16]->option1text }}</strong>
        @elseif($questions[16]->option1type == 'Text and Image')
        <strong>{{ $questions[16]->option1text }}<br /><img src="{{ asset($questions[16]->option1image) }}"></strong>
        @elseif($questions[16]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[16]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number16" id="number162" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[16]->option2type == 'Text Only')
        <strong>{{ $questions[16]->option2text }}</strong>
        @elseif($questions[16]->option2type == 'Text and Image')
        <strong>{{ $questions[16]->option2text }}<br /><img src="{{ asset($questions[16]->option2image) }}"></strong>
        @elseif($questions[16]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[16]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[16]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number16" id="number163" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[16]->option3type == 'Text Only')
        <strong>{{ $questions[16]->option3text }}</strong>
        @elseif($questions[16]->option3type == 'Text and Image')
        <strong>{{ $questions[16]->option3text }}<br /><img src="{{ asset($questions[16]->option3image) }}"></strong>
        @elseif($questions[16]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[16]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[16]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number16" id="number164" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[16]->option4type == 'Text Only')
        <strong>{{ $questions[16]->option4text }}</strong>
        @elseif($questions[16]->option4type == 'Text and Image')
        <strong>{{ $questions[16]->option4text }}<br /><img src="{{ asset($questions[16]->option4image) }}"></strong>
        @elseif($questions[16]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[16]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset



@isset($questions[17]->id)
<div class="form-group float-left" id="q18">
      <div id="question"> 
        @if($questions[17]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage17" class="btn btn-info btn-round" onclick="showpassage({!! $questions[17]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id17" id="question_id17" value="{{ $questions[17]->id }}">
        <div class="">
          <input type="hidden" name="questiontype17" id="questiontype17" value="{{ $questions[17]->questiontype }}">
          @if($questions[17]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion17" id="textquestion17" value="{{ $questions[17]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[17]->textquestion }}</strong></p>
          @elseif($questions[17]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion17" id="textquestion17" value="{{ $questions[17]->textquestion }}">
          <input type="hidden" name="imagequestion17" id="imagequestion17" value="{{ $questions[17]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[17]->textquestion }}<br /><img src="{{ asset($questions[17]->imagequestion) }}" ></strong></p>
          @elseif($questions[17]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion17" id="imagequestion17" value="{{ $questions[17]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[17]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number17" id="number171" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[17]->option1type == 'Text Only')
        <strong>{{ $questions[17]->option1text }}</strong>
        @elseif($questions[17]->option1type == 'Text and Image')
        <strong>{{ $questions[17]->option1text }}<br /><img src="{{ asset($questions[17]->option1image) }}"></strong>
        @elseif($questions[17]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[17]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number17" id="number172" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[17]->option2type == 'Text Only')
        <strong>{{ $questions[17]->option2text }}</strong>
        @elseif($questions[17]->option2type == 'Text and Image')
        <strong>{{ $questions[17]->option2text }}<br /><img src="{{ asset($questions[17]->option2image) }}"></strong>
        @elseif($questions[17]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[17]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[17]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number17" id="number173" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[17]->option3type == 'Text Only')
        <strong>{{ $questions[17]->option3text }}</strong>
        @elseif($questions[17]->option3type == 'Text and Image')
        <strong>{{ $questions[17]->option3text }}<br /><img src="{{ asset($questions[17]->option3image) }}"></strong>
        @elseif($questions[17]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[17]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[17]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number17" id="number174" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[17]->option4type == 'Text Only')
        <strong>{{ $questions[17]->option4text }}</strong>
        @elseif($questions[17]->option4type == 'Text and Image')
        <strong>{{ $questions[17]->option4text }}<br /><img src="{{ asset($questions[17]->option4image) }}"></strong>
        @elseif($questions[17]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[17]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[18]->id)
<div class="form-group float-left" id="q19">
      <div id="question"> 
        @if($questions[18]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage18" class="btn btn-info btn-round" onclick="showpassage({!! $questions[18]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id18" id="question_id18" value="{{ $questions[18]->id }}">
        <div class="">
          <input type="hidden" name="questiontype18" id="questiontype18" value="{{ $questions[18]->questiontype }}">
          @if($questions[18]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion18" id="textquestion18" value="{{ $questions[18]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[18]->textquestion }}</strong></p>
          @elseif($questions[18]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion18" id="textquestion18" value="{{ $questions[18]->textquestion }}">
          <input type="hidden" name="imagequestion18" id="imagequestion18" value="{{ $questions[18]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[18]->textquestion }}<br /><img src="{{ asset($questions[18]->imagequestion) }}" ></strong></p>
          @elseif($questions[18]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion18" id="imagequestion18" value="{{ $questions[18]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[18]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number18" id="number181" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[18]->option1type == 'Text Only')
        <strong>{{ $questions[18]->option1text }}</strong>
        @elseif($questions[18]->option1type == 'Text and Image')
        <strong>{{ $questions[18]->option1text }}<br /><img src="{{ asset($questions[18]->option1image) }}"></strong>
        @elseif($questions[18]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[18]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number18" id="number182" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[18]->option2type == 'Text Only')
        <strong>{{ $questions[18]->option2text }}</strong>
        @elseif($questions[18]->option2type == 'Text and Image')
        <strong>{{ $questions[18]->option2text }}<br /><img src="{{ asset($questions[18]->option2image) }}"></strong>
        @elseif($questions[18]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[18]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[18]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number18" id="number183" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[18]->option3type == 'Text Only')
        <strong>{{ $questions[18]->option3text }}</strong>
        @elseif($questions[18]->option3type == 'Text and Image')
        <strong>{{ $questions[18]->option3text }}<br /><img src="{{ asset($questions[18]->option3image) }}"></strong>
        @elseif($questions[18]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[18]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[18]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number18" id="number184" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[18]->option4type == 'Text Only')
        <strong>{{ $questions[18]->option4text }}</strong>
        @elseif($questions[18]->option4type == 'Text and Image')
        <strong>{{ $questions[18]->option4text }}<br /><img src="{{ asset($questions[18]->option4image) }}"></strong>
        @elseif($questions[18]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[18]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset



@isset($questions[19]->id)
<div class="form-group float-left" id="q20">
      <div id="question"> 
        @if($questions[19]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage19" class="btn btn-info btn-round" onclick="showpassage({!! $questions[19]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id19" id="question_id19" value="{{ $questions[19]->id }}">
        <div class="">
          <input type="hidden" name="questiontype19" id="questiontype19" value="{{ $questions[19]->questiontype }}">
          @if($questions[19]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion19" id="textquestion19" value="{{ $questions[19]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[19]->textquestion }}</strong></p>
          @elseif($questions[19]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion19" id="textquestion19" value="{{ $questions[19]->textquestion }}">
          <input type="hidden" name="imagequestion19" id="imagequestion19" value="{{ $questions[19]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[19]->textquestion }}<br /><img src="{{ asset($questions[19]->imagequestion) }}" ></strong></p>
          @elseif($questions[19]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion19" id="imagequestion19" value="{{ $questions[19]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[19]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number19" id="number191" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[19]->option1type == 'Text Only')
        <strong>{{ $questions[19]->option1text }}</strong>
        @elseif($questions[19]->option1type == 'Text and Image')
        <strong>{{ $questions[19]->option1text }}<br /><img src="{{ asset($questions[19]->option1image) }}"></strong>
        @elseif($questions[19]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[19]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number19" id="number192" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[19]->option2type == 'Text Only')
        <strong>{{ $questions[19]->option2text }}</strong>
        @elseif($questions[19]->option2type == 'Text and Image')
        <strong>{{ $questions[19]->option2text }}<br /><img src="{{ asset($questions[19]->option2image) }}"></strong>
        @elseif($questions[19]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[19]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[19]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number19" id="number193" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[19]->option3type == 'Text Only')
        <strong>{{ $questions[19]->option3text }}</strong>
        @elseif($questions[19]->option3type == 'Text and Image')
        <strong>{{ $questions[19]->option3text }}<br /><img src="{{ asset($questions[19]->option3image) }}"></strong>
        @elseif($questions[19]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[19]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[19]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number19" id="number194" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[19]->option4type == 'Text Only')
        <strong>{{ $questions[19]->option4text }}</strong>
        @elseif($questions[19]->option4type == 'Text and Image')
        <strong>{{ $questions[19]->option4text }}<br /><img src="{{ asset($questions[19]->option4image) }}"></strong>
        @elseif($questions[19]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[19]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[20]->id)
<div class="form-group float-left" id="q21">
      <div id="question"> 
        @if($questions[20]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage20" class="btn btn-info btn-round" onclick="showpassage({!! $questions[20]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id20" id="question_id20" value="{{ $questions[20]->id }}">
        <div class="">
          <input type="hidden" name="questiontype20" id="questiontype20" value="{{ $questions[20]->questiontype }}">
          @if($questions[20]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion20" id="textquestion20" value="{{ $questions[20]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[20]->textquestion }}</strong></p>
          @elseif($questions[20]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion20" id="textquestion20" value="{{ $questions[20]->textquestion }}">
          <input type="hidden" name="imagequestion20" id="imagequestion20" value="{{ $questions[20]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[20]->textquestion }}<br /><img src="{{ asset($questions[20]->imagequestion) }}" ></strong></p>
          @elseif($questions[20]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion20" id="imagequestion20" value="{{ $questions[20]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[20]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number20" id="number201" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[20]->option1type == 'Text Only')
        <strong>{{ $questions[20]->option1text }}</strong>
        @elseif($questions[20]->option1type == 'Text and Image')
        <strong>{{ $questions[20]->option1text }}<br /><img src="{{ asset($questions[20]->option1image) }}"></strong>
        @elseif($questions[20]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[20]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number20" id="number202" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[20]->option2type == 'Text Only')
        <strong>{{ $questions[20]->option2text }}</strong>
        @elseif($questions[20]->option2type == 'Text and Image')
        <strong>{{ $questions[20]->option2text }}<br /><img src="{{ asset($questions[20]->option2image) }}"></strong>
        @elseif($questions[20]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[20]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[20]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number20" id="number203" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[20]->option3type == 'Text Only')
        <strong>{{ $questions[20]->option3text }}</strong>
        @elseif($questions[20]->option3type == 'Text and Image')
        <strong>{{ $questions[20]->option3text }}<br /><img src="{{ asset($questions[20]->option3image) }}"></strong>
        @elseif($questions[20]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[20]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[20]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number20" id="number204" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[20]->option4type == 'Text Only')
        <strong>{{ $questions[20]->option4text }}</strong>
        @elseif($questions[20]->option4type == 'Text and Image')
        <strong>{{ $questions[20]->option4text }}<br /><img src="{{ asset($questions[20]->option4image) }}"></strong>
        @elseif($questions[20]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[20]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[21]->id)
<div class="form-group float-left" id="q22">
      <div id="question"> 
        @if($questions[21]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage21" class="btn btn-info btn-round" onclick="showpassage({!! $questions[21]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id21" id="question_id21" value="{{ $questions[21]->id }}">
        <div class="">
          <input type="hidden" name="questiontype21" id="questiontype21" value="{{ $questions[21]->questiontype }}">
          @if($questions[21]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion21" id="textquestion21" value="{{ $questions[21]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[21]->textquestion }}</strong></p>
          @elseif($questions[21]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion21" id="textquestion21" value="{{ $questions[21]->textquestion }}">
          <input type="hidden" name="imagequestion21" id="imagequestion21" value="{{ $questions[21]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[21]->textquestion }}<br /><img src="{{ asset($questions[21]->imagequestion) }}" ></strong></p>
          @elseif($questions[21]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion21" id="imagequestion21" value="{{ $questions[21]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[21]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number21" id="number211" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[21]->option1type == 'Text Only')
        <strong>{{ $questions[21]->option1text }}</strong>
        @elseif($questions[21]->option1type == 'Text and Image')
        <strong>{{ $questions[21]->option1text }}<br /><img src="{{ asset($questions[21]->option1image) }}"></strong>
        @elseif($questions[21]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[21]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number21" id="number212" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[21]->option2type == 'Text Only')
        <strong>{{ $questions[21]->option2text }}</strong>
        @elseif($questions[21]->option2type == 'Text and Image')
        <strong>{{ $questions[21]->option2text }}<br /><img src="{{ asset($questions[21]->option2image) }}"></strong>
        @elseif($questions[21]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[21]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[21]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number21" id="number213" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[21]->option3type == 'Text Only')
        <strong>{{ $questions[21]->option3text }}</strong>
        @elseif($questions[21]->option3type == 'Text and Image')
        <strong>{{ $questions[21]->option3text }}<br /><img src="{{ asset($questions[21]->option3image) }}"></strong>
        @elseif($questions[21]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[21]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[21]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number21" id="number214" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[21]->option4type == 'Text Only')
        <strong>{{ $questions[21]->option4text }}</strong>
        @elseif($questions[21]->option4type == 'Text and Image')
        <strong>{{ $questions[21]->option4text }}<br /><img src="{{ asset($questions[21]->option4image) }}"></strong>
        @elseif($questions[21]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[21]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[22]->id)
<div class="form-group float-left" id="q23">
      <div id="question"> 
        @if($questions[22]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage22" class="btn btn-info btn-round" onclick="showpassage({!! $questions[22]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id22" id="question_id22" value="{{ $questions[22]->id }}">
        <div class="">
          <input type="hidden" name="questiontype22" id="questiontype22" value="{{ $questions[22]->questiontype }}">
          @if($questions[22]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion22" id="textquestion22" value="{{ $questions[22]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[22]->textquestion }}</strong></p>
          @elseif($questions[22]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion22" id="textquestion22" value="{{ $questions[22]->textquestion }}">
          <input type="hidden" name="imagequestion22" id="imagequestion22" value="{{ $questions[22]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[22]->textquestion }}<br /><img src="{{ asset($questions[22]->imagequestion) }}" ></strong></p>
          @elseif($questions[22]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion22" id="imagequestion22" value="{{ $questions[22]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[22]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number22" id="number221" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[22]->option1type == 'Text Only')
        <strong>{{ $questions[22]->option1text }}</strong>
        @elseif($questions[22]->option1type == 'Text and Image')
        <strong>{{ $questions[22]->option1text }}<br /><img src="{{ asset($questions[22]->option1image) }}"></strong>
        @elseif($questions[22]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[22]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number22" id="number222" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[22]->option2type == 'Text Only')
        <strong>{{ $questions[22]->option2text }}</strong>
        @elseif($questions[22]->option2type == 'Text and Image')
        <strong>{{ $questions[22]->option2text }}<br /><img src="{{ asset($questions[22]->option2image) }}"></strong>
        @elseif($questions[22]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[22]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[22]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number22" id="number223" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[22]->option3type == 'Text Only')
        <strong>{{ $questions[22]->option3text }}</strong>
        @elseif($questions[22]->option3type == 'Text and Image')
        <strong>{{ $questions[22]->option3text }}<br /><img src="{{ asset($questions[22]->option3image) }}"></strong>
        @elseif($questions[22]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[22]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[22]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number22" id="number224" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[22]->option4type == 'Text Only')
        <strong>{{ $questions[22]->option4text }}</strong>
        @elseif($questions[22]->option4type == 'Text and Image')
        <strong>{{ $questions[22]->option4text }}<br /><img src="{{ asset($questions[22]->option4image) }}"></strong>
        @elseif($questions[22]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[22]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[23]->id)
<div class="form-group float-left" id="q24">
      <div id="question"> 
        @if($questions[23]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage23" class="btn btn-info btn-round" onclick="showpassage({!! $questions[23]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id23" id="question_id23" value="{{ $questions[23]->id }}">
        <div class="">
          <input type="hidden" name="questiontype23" id="questiontype23" value="{{ $questions[23]->questiontype }}">
          @if($questions[23]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion23" id="textquestion23" value="{{ $questions[23]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[23]->textquestion }}</strong></p>
          @elseif($questions[23]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion23" id="textquestion23" value="{{ $questions[23]->textquestion }}">
          <input type="hidden" name="imagequestion23" id="imagequestion23" value="{{ $questions[23]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[23]->textquestion }}<br /><img src="{{ asset($questions[23]->imagequestion) }}" ></strong></p>
          @elseif($questions[23]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion23" id="imagequestion23" value="{{ $questions[23]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[23]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number23" id="number231" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[23]->option1type == 'Text Only')
        <strong>{{ $questions[23]->option1text }}</strong>
        @elseif($questions[23]->option1type == 'Text and Image')
        <strong>{{ $questions[23]->option1text }}<br /><img src="{{ asset($questions[23]->option1image) }}"></strong>
        @elseif($questions[23]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[23]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number23" id="number232" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[23]->option2type == 'Text Only')
        <strong>{{ $questions[23]->option2text }}</strong>
        @elseif($questions[23]->option2type == 'Text and Image')
        <strong>{{ $questions[23]->option2text }}<br /><img src="{{ asset($questions[23]->option2image) }}"></strong>
        @elseif($questions[23]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[23]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[23]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number23" id="number233" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[23]->option3type == 'Text Only')
        <strong>{{ $questions[23]->option3text }}</strong>
        @elseif($questions[23]->option3type == 'Text and Image')
        <strong>{{ $questions[23]->option3text }}<br /><img src="{{ asset($questions[23]->option3image) }}"></strong>
        @elseif($questions[23]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[23]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[23]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number23" id="number234" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[23]->option4type == 'Text Only')
        <strong>{{ $questions[23]->option4text }}</strong>
        @elseif($questions[23]->option4type == 'Text and Image')
        <strong>{{ $questions[23]->option4text }}<br /><img src="{{ asset($questions[23]->option4image) }}"></strong>
        @elseif($questions[23]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[23]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[24]->id)
<div class="form-group float-left" id="q25">
      <div id="question"> 
        @if($questions[24]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage24" class="btn btn-info btn-round" onclick="showpassage({!! $questions[24]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id24" id="question_id24" value="{{ $questions[24]->id }}">
        <div class="">
          <input type="hidden" name="questiontype24" id="questiontype24" value="{{ $questions[24]->questiontype }}">
          @if($questions[24]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion24" id="textquestion24" value="{{ $questions[24]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[24]->textquestion }}</strong></p>
          @elseif($questions[24]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion24" id="textquestion24" value="{{ $questions[24]->textquestion }}">
          <input type="hidden" name="imagequestion24" id="imagequestion24" value="{{ $questions[24]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[24]->textquestion }}<br /><img src="{{ asset($questions[24]->imagequestion) }}" ></strong></p>
          @elseif($questions[24]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion24" id="imagequestion24" value="{{ $questions[24]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[24]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number24" id="number241" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[24]->option1type == 'Text Only')
        <strong>{{ $questions[24]->option1text }}</strong>
        @elseif($questions[24]->option1type == 'Text and Image')
        <strong>{{ $questions[24]->option1text }}<br /><img src="{{ asset($questions[24]->option1image) }}"></strong>
        @elseif($questions[24]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[24]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number24" id="number242" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[24]->option2type == 'Text Only')
        <strong>{{ $questions[24]->option2text }}</strong>
        @elseif($questions[24]->option2type == 'Text and Image')
        <strong>{{ $questions[24]->option2text }}<br /><img src="{{ asset($questions[24]->option2image) }}"></strong>
        @elseif($questions[24]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[24]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[24]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number24" id="number243" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[24]->option3type == 'Text Only')
        <strong>{{ $questions[24]->option3text }}</strong>
        @elseif($questions[24]->option3type == 'Text and Image')
        <strong>{{ $questions[24]->option3text }}<br /><img src="{{ asset($questions[24]->option3image) }}"></strong>
        @elseif($questions[24]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[24]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[24]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number24" id="number244" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[24]->option4type == 'Text Only')
        <strong>{{ $questions[24]->option4text }}</strong>
        @elseif($questions[24]->option4type == 'Text and Image')
        <strong>{{ $questions[24]->option4text }}<br /><img src="{{ asset($questions[24]->option4image) }}"></strong>
        @elseif($questions[24]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[24]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[25]->id)
<div class="form-group float-left" id="q26">
      <div id="question"> 
        @if($questions[25]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage25" class="btn btn-info btn-round" onclick="showpassage({!! $questions[25]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id25" id="question_id25" value="{{ $questions[25]->id }}">
        <div class="">
          <input type="hidden" name="questiontype25" id="questiontype25" value="{{ $questions[25]->questiontype }}">
          @if($questions[25]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion25" id="textquestion25" value="{{ $questions[25]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[25]->textquestion }}</strong></p>
          @elseif($questions[25]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion25" id="textquestion25" value="{{ $questions[25]->textquestion }}">
          <input type="hidden" name="imagequestion25" id="imagequestion25" value="{{ $questions[25]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[25]->textquestion }}<br /><img src="{{ asset($questions[25]->imagequestion) }}" ></strong></p>
          @elseif($questions[25]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion25" id="imagequestion25" value="{{ $questions[25]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[25]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number25" id="number251" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[25]->option1type == 'Text Only')
        <strong>{{ $questions[25]->option1text }}</strong>
        @elseif($questions[25]->option1type == 'Text and Image')
        <strong>{{ $questions[25]->option1text }}<br /><img src="{{ asset($questions[25]->option1image) }}"></strong>
        @elseif($questions[25]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[25]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number25" id="number252" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[25]->option2type == 'Text Only')
        <strong>{{ $questions[25]->option2text }}</strong>
        @elseif($questions[25]->option2type == 'Text and Image')
        <strong>{{ $questions[25]->option2text }}<br /><img src="{{ asset($questions[25]->option2image) }}"></strong>
        @elseif($questions[25]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[25]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[25]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number25" id="number253" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[25]->option3type == 'Text Only')
        <strong>{{ $questions[25]->option3text }}</strong>
        @elseif($questions[25]->option3type == 'Text and Image')
        <strong>{{ $questions[25]->option3text }}<br /><img src="{{ asset($questions[25]->option3image) }}"></strong>
        @elseif($questions[25]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[25]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[25]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number25" id="number254" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[25]->option4type == 'Text Only')
        <strong>{{ $questions[25]->option4text }}</strong>
        @elseif($questions[25]->option4type == 'Text and Image')
        <strong>{{ $questions[25]->option4text }}<br /><img src="{{ asset($questions[25]->option4image) }}"></strong>
        @elseif($questions[25]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[25]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[26]->id)
<div class="form-group float-left" id="q27">
      <div id="question"> 
        @if($questions[26]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage26" class="btn btn-info btn-round" onclick="showpassage({!! $questions[26]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id26" id="question_id26" value="{{ $questions[26]->id }}">
        <div class="">
          <input type="hidden" name="questiontype26" id="questiontype26" value="{{ $questions[26]->questiontype }}">
          @if($questions[26]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion26" id="textquestion26" value="{{ $questions[26]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[26]->textquestion }}</strong></p>
          @elseif($questions[26]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion26" id="textquestion26" value="{{ $questions[26]->textquestion }}">
          <input type="hidden" name="imagequestion26" id="imagequestion26" value="{{ $questions[26]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[26]->textquestion }}<br /><img src="{{ asset($questions[26]->imagequestion) }}" ></strong></p>
          @elseif($questions[26]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion26" id="imagequestion26" value="{{ $questions[26]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[26]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number26" id="number261" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[26]->option1type == 'Text Only')
        <strong>{{ $questions[26]->option1text }}</strong>
        @elseif($questions[26]->option1type == 'Text and Image')
        <strong>{{ $questions[26]->option1text }}<br /><img src="{{ asset($questions[26]->option1image) }}"></strong>
        @elseif($questions[26]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[26]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number26" id="number262" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[26]->option2type == 'Text Only')
        <strong>{{ $questions[26]->option2text }}</strong>
        @elseif($questions[26]->option2type == 'Text and Image')
        <strong>{{ $questions[26]->option2text }}<br /><img src="{{ asset($questions[26]->option2image) }}"></strong>
        @elseif($questions[26]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[26]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[26]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number26" id="number263" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[26]->option3type == 'Text Only')
        <strong>{{ $questions[26]->option3text }}</strong>
        @elseif($questions[26]->option3type == 'Text and Image')
        <strong>{{ $questions[26]->option3text }}<br /><img src="{{ asset($questions[26]->option3image) }}"></strong>
        @elseif($questions[26]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[26]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[26]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number26" id="number264" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[26]->option4type == 'Text Only')
        <strong>{{ $questions[26]->option4text }}</strong>
        @elseif($questions[26]->option4type == 'Text and Image')
        <strong>{{ $questions[26]->option4text }}<br /><img src="{{ asset($questions[26]->option4image) }}"></strong>
        @elseif($questions[26]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[26]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[27]->id)
<div class="form-group float-left" id="q28">
      <div id="question"> 
        @if($questions[27]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage27" class="btn btn-info btn-round" onclick="showpassage({!! $questions[27]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id27" id="question_id27" value="{{ $questions[27]->id }}">
        <div class="">
          <input type="hidden" name="questiontype27" id="questiontype27" value="{{ $questions[27]->questiontype }}">
          @if($questions[27]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion27" id="textquestion27" value="{{ $questions[27]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[27]->textquestion }}</strong></p>
          @elseif($questions[27]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion27" id="textquestion27" value="{{ $questions[27]->textquestion }}">
          <input type="hidden" name="imagequestion27" id="imagequestion27" value="{{ $questions[27]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[27]->textquestion }}<br /><img src="{{ asset($questions[27]->imagequestion) }}" ></strong></p>
          @elseif($questions[27]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion27" id="imagequestion27" value="{{ $questions[27]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[27]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number27" id="number271" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[27]->option1type == 'Text Only')
        <strong>{{ $questions[27]->option1text }}</strong>
        @elseif($questions[27]->option1type == 'Text and Image')
        <strong>{{ $questions[27]->option1text }}<br /><img src="{{ asset($questions[27]->option1image) }}"></strong>
        @elseif($questions[27]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[27]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number27" id="number272" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[27]->option2type == 'Text Only')
        <strong>{{ $questions[27]->option2text }}</strong>
        @elseif($questions[27]->option2type == 'Text and Image')
        <strong>{{ $questions[27]->option2text }}<br /><img src="{{ asset($questions[27]->option2image) }}"></strong>
        @elseif($questions[27]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[27]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[27]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number27" id="number273" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[27]->option3type == 'Text Only')
        <strong>{{ $questions[27]->option3text }}</strong>
        @elseif($questions[27]->option3type == 'Text and Image')
        <strong>{{ $questions[27]->option3text }}<br /><img src="{{ asset($questions[27]->option3image) }}"></strong>
        @elseif($questions[27]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[27]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[27]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number27" id="number274" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[27]->option4type == 'Text Only')
        <strong>{{ $questions[27]->option4text }}</strong>
        @elseif($questions[27]->option4type == 'Text and Image')
        <strong>{{ $questions[27]->option4text }}<br /><img src="{{ asset($questions[27]->option4image) }}"></strong>
        @elseif($questions[27]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[27]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[28]->id)
<div class="form-group float-left" id="q29">
      <div id="question"> 
        @if($questions[28]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage28" class="btn btn-info btn-round" onclick="showpassage({!! $questions[28]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id28" id="question_id28" value="{{ $questions[28]->id }}">
        <div class="">
          <input type="hidden" name="questiontype28" id="questiontype28" value="{{ $questions[28]->questiontype }}">
          @if($questions[28]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion28" id="textquestion28" value="{{ $questions[28]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[28]->textquestion }}</strong></p>
          @elseif($questions[28]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion28" id="textquestion28" value="{{ $questions[28]->textquestion }}">
          <input type="hidden" name="imagequestion28" id="imagequestion28" value="{{ $questions[28]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[28]->textquestion }}<br /><img src="{{ asset($questions[28]->imagequestion) }}" ></strong></p>
          @elseif($questions[28]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion28" id="imagequestion28" value="{{ $questions[28]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[28]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number28" id="number281" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[28]->option1type == 'Text Only')
        <strong>{{ $questions[28]->option1text }}</strong>
        @elseif($questions[28]->option1type == 'Text and Image')
        <strong>{{ $questions[28]->option1text }}<br /><img src="{{ asset($questions[28]->option1image) }}"></strong>
        @elseif($questions[28]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[28]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number28" id="number282" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[28]->option2type == 'Text Only')
        <strong>{{ $questions[28]->option2text }}</strong>
        @elseif($questions[28]->option2type == 'Text and Image')
        <strong>{{ $questions[28]->option2text }}<br /><img src="{{ asset($questions[28]->option2image) }}"></strong>
        @elseif($questions[28]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[28]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[28]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number28" id="number283" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[28]->option3type == 'Text Only')
        <strong>{{ $questions[28]->option3text }}</strong>
        @elseif($questions[28]->option3type == 'Text and Image')
        <strong>{{ $questions[28]->option3text }}<br /><img src="{{ asset($questions[28]->option3image) }}"></strong>
        @elseif($questions[28]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[28]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[28]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number28" id="number284" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[28]->option4type == 'Text Only')
        <strong>{{ $questions[28]->option4text }}</strong>
        @elseif($questions[28]->option4type == 'Text and Image')
        <strong>{{ $questions[28]->option4text }}<br /><img src="{{ asset($questions[28]->option4image) }}"></strong>
        @elseif($questions[28]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[28]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[29]->id)
<div class="form-group float-left" id="q30">
      <div id="question"> 
        @if($questions[29]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage29" class="btn btn-info btn-round" onclick="showpassage({!! $questions[29]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id29" id="question_id29" value="{{ $questions[29]->id }}">
        <div class="">
          <input type="hidden" name="questiontype29" id="questiontype29" value="{{ $questions[29]->questiontype }}">
          @if($questions[29]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion29" id="textquestion29" value="{{ $questions[29]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[29]->textquestion }}</strong></p>
          @elseif($questions[29]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion29" id="textquestion29" value="{{ $questions[29]->textquestion }}">
          <input type="hidden" name="imagequestion29" id="imagequestion29" value="{{ $questions[29]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[29]->textquestion }}<br /><img src="{{ asset($questions[29]->imagequestion) }}" ></strong></p>
          @elseif($questions[29]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion29" id="imagequestion29" value="{{ $questions[29]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[29]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number29" id="number291" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[29]->option1type == 'Text Only')
        <strong>{{ $questions[29]->option1text }}</strong>
        @elseif($questions[29]->option1type == 'Text and Image')
        <strong>{{ $questions[29]->option1text }}<br /><img src="{{ asset($questions[29]->option1image) }}"></strong>
        @elseif($questions[29]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[29]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number29" id="number292" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[29]->option2type == 'Text Only')
        <strong>{{ $questions[29]->option2text }}</strong>
        @elseif($questions[29]->option2type == 'Text and Image')
        <strong>{{ $questions[29]->option2text }}<br /><img src="{{ asset($questions[29]->option2image) }}"></strong>
        @elseif($questions[29]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[29]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[29]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number29" id="number293" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[29]->option3type == 'Text Only')
        <strong>{{ $questions[29]->option3text }}</strong>
        @elseif($questions[29]->option3type == 'Text and Image')
        <strong>{{ $questions[29]->option3text }}<br /><img src="{{ asset($questions[29]->option3image) }}"></strong>
        @elseif($questions[29]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[29]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[29]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number29" id="number294" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[29]->option4type == 'Text Only')
        <strong>{{ $questions[29]->option4text }}</strong>
        @elseif($questions[29]->option4type == 'Text and Image')
        <strong>{{ $questions[29]->option4text }}<br /><img src="{{ asset($questions[29]->option4image) }}"></strong>
        @elseif($questions[29]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[29]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[30]->id)
<div class="form-group float-left" id="q31">
      <div id="question"> 
        @if($questions[30]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage30" class="btn btn-info btn-round" onclick="showpassage({!! $questions[30]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id30" id="question_id30" value="{{ $questions[30]->id }}">
        <div class="">
          <input type="hidden" name="questiontype30" id="questiontype30" value="{{ $questions[30]->questiontype }}">
          @if($questions[30]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion30" id="textquestion30" value="{{ $questions[30]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[30]->textquestion }}</strong></p>
          @elseif($questions[30]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion30" id="textquestion30" value="{{ $questions[30]->textquestion }}">
          <input type="hidden" name="imagequestion30" id="imagequestion30" value="{{ $questions[30]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[30]->textquestion }}<br /><img src="{{ asset($questions[30]->imagequestion) }}" ></strong></p>
          @elseif($questions[30]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion30" id="imagequestion30" value="{{ $questions[30]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[30]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number30" id="number301" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[30]->option1type == 'Text Only')
        <strong>{{ $questions[30]->option1text }}</strong>
        @elseif($questions[30]->option1type == 'Text and Image')
        <strong>{{ $questions[30]->option1text }}<br /><img src="{{ asset($questions[30]->option1image) }}"></strong>
        @elseif($questions[30]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[30]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number30" id="number302" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[30]->option2type == 'Text Only')
        <strong>{{ $questions[30]->option2text }}</strong>
        @elseif($questions[30]->option2type == 'Text and Image')
        <strong>{{ $questions[30]->option2text }}<br /><img src="{{ asset($questions[30]->option2image) }}"></strong>
        @elseif($questions[30]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[30]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[30]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number30" id="number303" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[30]->option3type == 'Text Only')
        <strong>{{ $questions[30]->option3text }}</strong>
        @elseif($questions[30]->option3type == 'Text and Image')
        <strong>{{ $questions[30]->option3text }}<br /><img src="{{ asset($questions[30]->option3image) }}"></strong>
        @elseif($questions[30]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[30]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[30]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number30" id="number304" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[30]->option4type == 'Text Only')
        <strong>{{ $questions[30]->option4text }}</strong>
        @elseif($questions[30]->option4type == 'Text and Image')
        <strong>{{ $questions[30]->option4text }}<br /><img src="{{ asset($questions[30]->option4image) }}"></strong>
        @elseif($questions[30]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[30]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[31]->id)
<div class="form-group float-left" id="q32">
      <div id="question"> 
        @if($questions[31]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage31" class="btn btn-info btn-round" onclick="showpassage({!! $questions[31]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id31" id="question_id31" value="{{ $questions[31]->id }}">
        <div class="">
          <input type="hidden" name="questiontype31" id="questiontype31" value="{{ $questions[31]->questiontype }}">
          @if($questions[31]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion31" id="textquestion31" value="{{ $questions[31]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[31]->textquestion }}</strong></p>
          @elseif($questions[31]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion31" id="textquestion31" value="{{ $questions[31]->textquestion }}">
          <input type="hidden" name="imagequestion31" id="imagequestion31" value="{{ $questions[31]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[31]->textquestion }}<br /><img src="{{ asset($questions[31]->imagequestion) }}" ></strong></p>
          @elseif($questions[31]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion31" id="imagequestion31" value="{{ $questions[31]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[31]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number31" id="number311" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[31]->option1type == 'Text Only')
        <strong>{{ $questions[31]->option1text }}</strong>
        @elseif($questions[31]->option1type == 'Text and Image')
        <strong>{{ $questions[31]->option1text }}<br /><img src="{{ asset($questions[31]->option1image) }}"></strong>
        @elseif($questions[31]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[31]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number31" id="number312" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[31]->option2type == 'Text Only')
        <strong>{{ $questions[31]->option2text }}</strong>
        @elseif($questions[31]->option2type == 'Text and Image')
        <strong>{{ $questions[31]->option2text }}<br /><img src="{{ asset($questions[31]->option2image) }}"></strong>
        @elseif($questions[31]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[31]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[31]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number31" id="number313" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[31]->option3type == 'Text Only')
        <strong>{{ $questions[31]->option3text }}</strong>
        @elseif($questions[31]->option3type == 'Text and Image')
        <strong>{{ $questions[31]->option3text }}<br /><img src="{{ asset($questions[31]->option3image) }}"></strong>
        @elseif($questions[31]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[31]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[31]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number31" id="number314" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[31]->option4type == 'Text Only')
        <strong>{{ $questions[31]->option4text }}</strong>
        @elseif($questions[31]->option4type == 'Text and Image')
        <strong>{{ $questions[31]->option4text }}<br /><img src="{{ asset($questions[31]->option4image) }}"></strong>
        @elseif($questions[31]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[31]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[32]->id)
<div class="form-group float-left" id="q33">
      <div id="question"> 
        @if($questions[32]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage32" class="btn btn-info btn-round" onclick="showpassage({!! $questions[32]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id32" id="question_id32" value="{{ $questions[32]->id }}">
        <div class="">
          <input type="hidden" name="questiontype32" id="questiontype32" value="{{ $questions[32]->questiontype }}">
          @if($questions[32]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion32" id="textquestion32" value="{{ $questions[32]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[32]->textquestion }}</strong></p>
          @elseif($questions[32]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion32" id="textquestion32" value="{{ $questions[32]->textquestion }}">
          <input type="hidden" name="imagequestion32" id="imagequestion32" value="{{ $questions[32]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[32]->textquestion }}<br /><img src="{{ asset($questions[32]->imagequestion) }}" ></strong></p>
          @elseif($questions[32]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion32" id="imagequestion32" value="{{ $questions[32]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[32]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number32" id="number321" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[32]->option1type == 'Text Only')
        <strong>{{ $questions[32]->option1text }}</strong>
        @elseif($questions[32]->option1type == 'Text and Image')
        <strong>{{ $questions[32]->option1text }}<br /><img src="{{ asset($questions[32]->option1image) }}"></strong>
        @elseif($questions[32]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[32]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number32" id="number322" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[32]->option2type == 'Text Only')
        <strong>{{ $questions[32]->option2text }}</strong>
        @elseif($questions[32]->option2type == 'Text and Image')
        <strong>{{ $questions[32]->option2text }}<br /><img src="{{ asset($questions[32]->option2image) }}"></strong>
        @elseif($questions[32]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[32]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[32]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number32" id="number323" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[32]->option3type == 'Text Only')
        <strong>{{ $questions[32]->option3text }}</strong>
        @elseif($questions[32]->option3type == 'Text and Image')
        <strong>{{ $questions[32]->option3text }}<br /><img src="{{ asset($questions[32]->option3image) }}"></strong>
        @elseif($questions[32]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[32]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[32]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number32" id="number324" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[32]->option4type == 'Text Only')
        <strong>{{ $questions[32]->option4text }}</strong>
        @elseif($questions[32]->option4type == 'Text and Image')
        <strong>{{ $questions[32]->option4text }}<br /><img src="{{ asset($questions[32]->option4image) }}"></strong>
        @elseif($questions[32]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[32]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[33]->id)
<div class="form-group float-left" id="q34">
      <div id="question"> 
        @if($questions[33]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage33" class="btn btn-info btn-round" onclick="showpassage({!! $questions[33]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id33" id="question_id33" value="{{ $questions[33]->id }}">
        <div class="">
          <input type="hidden" name="questiontype33" id="questiontype33" value="{{ $questions[33]->questiontype }}">
          @if($questions[33]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion33" id="textquestion33" value="{{ $questions[33]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[33]->textquestion }}</strong></p>
          @elseif($questions[33]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion33" id="textquestion33" value="{{ $questions[33]->textquestion }}">
          <input type="hidden" name="imagequestion33" id="imagequestion33" value="{{ $questions[33]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[33]->textquestion }}<br /><img src="{{ asset($questions[33]->imagequestion) }}" ></strong></p>
          @elseif($questions[33]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion33" id="imagequestion33" value="{{ $questions[33]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[33]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number33" id="number331" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[33]->option1type == 'Text Only')
        <strong>{{ $questions[33]->option1text }}</strong>
        @elseif($questions[33]->option1type == 'Text and Image')
        <strong>{{ $questions[33]->option1text }}<br /><img src="{{ asset($questions[33]->option1image) }}"></strong>
        @elseif($questions[33]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[33]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number33" id="number332" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[33]->option2type == 'Text Only')
        <strong>{{ $questions[33]->option2text }}</strong>
        @elseif($questions[33]->option2type == 'Text and Image')
        <strong>{{ $questions[33]->option2text }}<br /><img src="{{ asset($questions[33]->option2image) }}"></strong>
        @elseif($questions[33]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[33]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[33]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number33" id="number333" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[33]->option3type == 'Text Only')
        <strong>{{ $questions[33]->option3text }}</strong>
        @elseif($questions[33]->option3type == 'Text and Image')
        <strong>{{ $questions[33]->option3text }}<br /><img src="{{ asset($questions[33]->option3image) }}"></strong>
        @elseif($questions[33]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[33]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[33]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number33" id="number334" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[33]->option4type == 'Text Only')
        <strong>{{ $questions[33]->option4text }}</strong>
        @elseif($questions[33]->option4type == 'Text and Image')
        <strong>{{ $questions[33]->option4text }}<br /><img src="{{ asset($questions[33]->option4image) }}"></strong>
        @elseif($questions[33]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[33]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[34]->id)
<div class="form-group float-left" id="q35">
      <div id="question"> 
        @if($questions[34]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage34" class="btn btn-info btn-round" onclick="showpassage({!! $questions[34]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id34" id="question_id34" value="{{ $questions[34]->id }}">
        <div class="">
          <input type="hidden" name="questiontype34" id="questiontype34" value="{{ $questions[34]->questiontype }}">
          @if($questions[34]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion34" id="textquestion34" value="{{ $questions[34]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[34]->textquestion }}</strong></p>
          @elseif($questions[34]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion34" id="textquestion34" value="{{ $questions[34]->textquestion }}">
          <input type="hidden" name="imagequestion34" id="imagequestion34" value="{{ $questions[34]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[34]->textquestion }}<br /><img src="{{ asset($questions[34]->imagequestion) }}" ></strong></p>
          @elseif($questions[34]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion34" id="imagequestion34" value="{{ $questions[34]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[34]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number34" id="number341" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[34]->option1type == 'Text Only')
        <strong>{{ $questions[34]->option1text }}</strong>
        @elseif($questions[34]->option1type == 'Text and Image')
        <strong>{{ $questions[34]->option1text }}<br /><img src="{{ asset($questions[34]->option1image) }}"></strong>
        @elseif($questions[34]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[34]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number34" id="number342" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[34]->option2type == 'Text Only')
        <strong>{{ $questions[34]->option2text }}</strong>
        @elseif($questions[34]->option2type == 'Text and Image')
        <strong>{{ $questions[34]->option2text }}<br /><img src="{{ asset($questions[34]->option2image) }}"></strong>
        @elseif($questions[34]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[34]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[34]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number34" id="number343" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[34]->option3type == 'Text Only')
        <strong>{{ $questions[34]->option3text }}</strong>
        @elseif($questions[34]->option3type == 'Text and Image')
        <strong>{{ $questions[34]->option3text }}<br /><img src="{{ asset($questions[34]->option3image) }}"></strong>
        @elseif($questions[34]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[34]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[34]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number34" id="number344" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[34]->option4type == 'Text Only')
        <strong>{{ $questions[34]->option4text }}</strong>
        @elseif($questions[34]->option4type == 'Text and Image')
        <strong>{{ $questions[34]->option4text }}<br /><img src="{{ asset($questions[34]->option4image) }}"></strong>
        @elseif($questions[34]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[34]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[35]->id)
<div class="form-group float-left" id="q36">
      <div id="question"> 
        @if($questions[35]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage35" class="btn btn-info btn-round" onclick="showpassage({!! $questions[35]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id35" id="question_id35" value="{{ $questions[35]->id }}">
        <div class="">
          <input type="hidden" name="questiontype35" id="questiontype35" value="{{ $questions[35]->questiontype }}">
          @if($questions[35]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion35" id="textquestion35" value="{{ $questions[35]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[35]->textquestion }}</strong></p>
          @elseif($questions[35]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion35" id="textquestion35" value="{{ $questions[35]->textquestion }}">
          <input type="hidden" name="imagequestion35" id="imagequestion35" value="{{ $questions[35]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[35]->textquestion }}<br /><img src="{{ asset($questions[35]->imagequestion) }}" ></strong></p>
          @elseif($questions[35]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion35" id="imagequestion35" value="{{ $questions[35]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[35]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number35" id="number351" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[35]->option1type == 'Text Only')
        <strong>{{ $questions[35]->option1text }}</strong>
        @elseif($questions[35]->option1type == 'Text and Image')
        <strong>{{ $questions[35]->option1text }}<br /><img src="{{ asset($questions[35]->option1image) }}"></strong>
        @elseif($questions[35]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[35]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number35" id="number352" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[35]->option2type == 'Text Only')
        <strong>{{ $questions[35]->option2text }}</strong>
        @elseif($questions[35]->option2type == 'Text and Image')
        <strong>{{ $questions[35]->option2text }}<br /><img src="{{ asset($questions[35]->option2image) }}"></strong>
        @elseif($questions[35]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[35]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[35]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number35" id="number353" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[35]->option3type == 'Text Only')
        <strong>{{ $questions[35]->option3text }}</strong>
        @elseif($questions[35]->option3type == 'Text and Image')
        <strong>{{ $questions[35]->option3text }}<br /><img src="{{ asset($questions[35]->option3image) }}"></strong>
        @elseif($questions[35]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[35]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[35]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number35" id="number354" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[35]->option4type == 'Text Only')
        <strong>{{ $questions[35]->option4text }}</strong>
        @elseif($questions[35]->option4type == 'Text and Image')
        <strong>{{ $questions[35]->option4text }}<br /><img src="{{ asset($questions[35]->option4image) }}"></strong>
        @elseif($questions[35]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[35]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[36]->id)
<div class="form-group float-left" id="q37">
      <div id="question"> 
        @if($questions[36]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage36" class="btn btn-info btn-round" onclick="showpassage({!! $questions[36]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id36" id="question_id36" value="{{ $questions[36]->id }}">
        <div class="">
          <input type="hidden" name="questiontype36" id="questiontype36" value="{{ $questions[36]->questiontype }}">
          @if($questions[36]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion36" id="textquestion36" value="{{ $questions[36]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[36]->textquestion }}</strong></p>
          @elseif($questions[36]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion36" id="textquestion36" value="{{ $questions[36]->textquestion }}">
          <input type="hidden" name="imagequestion36" id="imagequestion36" value="{{ $questions[36]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[36]->textquestion }}<br /><img src="{{ asset($questions[36]->imagequestion) }}" ></strong></p>
          @elseif($questions[36]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion36" id="imagequestion36" value="{{ $questions[36]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[36]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number36" id="number361" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[36]->option1type == 'Text Only')
        <strong>{{ $questions[36]->option1text }}</strong>
        @elseif($questions[36]->option1type == 'Text and Image')
        <strong>{{ $questions[36]->option1text }}<br /><img src="{{ asset($questions[36]->option1image) }}"></strong>
        @elseif($questions[36]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[36]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number36" id="number362" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[36]->option2type == 'Text Only')
        <strong>{{ $questions[36]->option2text }}</strong>
        @elseif($questions[36]->option2type == 'Text and Image')
        <strong>{{ $questions[36]->option2text }}<br /><img src="{{ asset($questions[36]->option2image) }}"></strong>
        @elseif($questions[36]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[36]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[36]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number36" id="number363" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[36]->option3type == 'Text Only')
        <strong>{{ $questions[36]->option3text }}</strong>
        @elseif($questions[36]->option3type == 'Text and Image')
        <strong>{{ $questions[36]->option3text }}<br /><img src="{{ asset($questions[36]->option3image) }}"></strong>
        @elseif($questions[36]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[36]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[36]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number36" id="number364" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[36]->option4type == 'Text Only')
        <strong>{{ $questions[36]->option4text }}</strong>
        @elseif($questions[36]->option4type == 'Text and Image')
        <strong>{{ $questions[36]->option4text }}<br /><img src="{{ asset($questions[36]->option4image) }}"></strong>
        @elseif($questions[36]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[36]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[37]->id)
<div class="form-group float-left" id="q38">
      <div id="question"> 
        @if($questions[37]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage37" class="btn btn-info btn-round" onclick="showpassage({!! $questions[37]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id37" id="question_id37" value="{{ $questions[37]->id }}">
        <div class="">
          <input type="hidden" name="questiontype37" id="questiontype37" value="{{ $questions[37]->questiontype }}">
          @if($questions[37]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion37" id="textquestion37" value="{{ $questions[37]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[37]->textquestion }}</strong></p>
          @elseif($questions[37]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion37" id="textquestion37" value="{{ $questions[37]->textquestion }}">
          <input type="hidden" name="imagequestion37" id="imagequestion37" value="{{ $questions[37]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[37]->textquestion }}<br /><img src="{{ asset($questions[37]->imagequestion) }}" ></strong></p>
          @elseif($questions[37]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion37" id="imagequestion37" value="{{ $questions[37]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[37]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number37" id="number371" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[37]->option1type == 'Text Only')
        <strong>{{ $questions[37]->option1text }}</strong>
        @elseif($questions[37]->option1type == 'Text and Image')
        <strong>{{ $questions[37]->option1text }}<br /><img src="{{ asset($questions[37]->option1image) }}"></strong>
        @elseif($questions[37]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[37]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number37" id="number372" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[37]->option2type == 'Text Only')
        <strong>{{ $questions[37]->option2text }}</strong>
        @elseif($questions[37]->option2type == 'Text and Image')
        <strong>{{ $questions[37]->option2text }}<br /><img src="{{ asset($questions[37]->option2image) }}"></strong>
        @elseif($questions[37]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[37]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[37]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number37" id="number373" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[37]->option3type == 'Text Only')
        <strong>{{ $questions[37]->option3text }}</strong>
        @elseif($questions[37]->option3type == 'Text and Image')
        <strong>{{ $questions[37]->option3text }}<br /><img src="{{ asset($questions[37]->option3image) }}"></strong>
        @elseif($questions[37]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[37]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[37]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number37" id="number374" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[37]->option4type == 'Text Only')
        <strong>{{ $questions[37]->option4text }}</strong>
        @elseif($questions[37]->option4type == 'Text and Image')
        <strong>{{ $questions[37]->option4text }}<br /><img src="{{ asset($questions[37]->option4image) }}"></strong>
        @elseif($questions[37]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[37]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[38]->id)
<div class="form-group float-left" id="q39">
      <div id="question"> 
        @if($questions[38]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage38" class="btn btn-info btn-round" onclick="showpassage({!! $questions[38]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id38" id="question_id38" value="{{ $questions[38]->id }}">
        <div class="">
          <input type="hidden" name="questiontype38" id="questiontype38" value="{{ $questions[38]->questiontype }}">
          @if($questions[38]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion38" id="textquestion38" value="{{ $questions[38]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[38]->textquestion }}</strong></p>
          @elseif($questions[38]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion38" id="textquestion38" value="{{ $questions[38]->textquestion }}">
          <input type="hidden" name="imagequestion38" id="imagequestion38" value="{{ $questions[38]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[38]->textquestion }}<br /><img src="{{ asset($questions[38]->imagequestion) }}" ></strong></p>
          @elseif($questions[38]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion38" id="imagequestion38" value="{{ $questions[38]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[38]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number38" id="number381" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[38]->option1type == 'Text Only')
        <strong>{{ $questions[38]->option1text }}</strong>
        @elseif($questions[38]->option1type == 'Text and Image')
        <strong>{{ $questions[38]->option1text }}<br /><img src="{{ asset($questions[38]->option1image) }}"></strong>
        @elseif($questions[38]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[38]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number38" id="number382" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[38]->option2type == 'Text Only')
        <strong>{{ $questions[38]->option2text }}</strong>
        @elseif($questions[38]->option2type == 'Text and Image')
        <strong>{{ $questions[38]->option2text }}<br /><img src="{{ asset($questions[38]->option2image) }}"></strong>
        @elseif($questions[38]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[38]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[38]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number38" id="number383" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[38]->option3type == 'Text Only')
        <strong>{{ $questions[38]->option3text }}</strong>
        @elseif($questions[38]->option3type == 'Text and Image')
        <strong>{{ $questions[38]->option3text }}<br /><img src="{{ asset($questions[38]->option3image) }}"></strong>
        @elseif($questions[38]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[38]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[38]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number38" id="number384" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[38]->option4type == 'Text Only')
        <strong>{{ $questions[38]->option4text }}</strong>
        @elseif($questions[38]->option4type == 'Text and Image')
        <strong>{{ $questions[38]->option4text }}<br /><img src="{{ asset($questions[38]->option4image) }}"></strong>
        @elseif($questions[38]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[38]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[39]->id)
<div class="form-group float-left" id="q40">
      <div id="question"> 
        @if($questions[39]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage39" class="btn btn-info btn-round" onclick="showpassage({!! $questions[39]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id39" id="question_id39" value="{{ $questions[39]->id }}">
        <div class="">
          <input type="hidden" name="questiontype39" id="questiontype39" value="{{ $questions[39]->questiontype }}">
          @if($questions[39]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion39" id="textquestion39" value="{{ $questions[39]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[39]->textquestion }}</strong></p>
          @elseif($questions[39]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion39" id="textquestion39" value="{{ $questions[39]->textquestion }}">
          <input type="hidden" name="imagequestion39" id="imagequestion39" value="{{ $questions[39]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[39]->textquestion }}<br /><img src="{{ asset($questions[39]->imagequestion) }}" ></strong></p>
          @elseif($questions[39]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion39" id="imagequestion39" value="{{ $questions[39]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[39]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number39" id="number391" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[39]->option1type == 'Text Only')
        <strong>{{ $questions[39]->option1text }}</strong>
        @elseif($questions[39]->option1type == 'Text and Image')
        <strong>{{ $questions[39]->option1text }}<br /><img src="{{ asset($questions[39]->option1image) }}"></strong>
        @elseif($questions[39]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[39]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number39" id="number392" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[39]->option2type == 'Text Only')
        <strong>{{ $questions[39]->option2text }}</strong>
        @elseif($questions[39]->option2type == 'Text and Image')
        <strong>{{ $questions[39]->option2text }}<br /><img src="{{ asset($questions[39]->option2image) }}"></strong>
        @elseif($questions[39]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[39]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[39]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number39" id="number393" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[39]->option3type == 'Text Only')
        <strong>{{ $questions[39]->option3text }}</strong>
        @elseif($questions[39]->option3type == 'Text and Image')
        <strong>{{ $questions[39]->option3text }}<br /><img src="{{ asset($questions[39]->option3image) }}"></strong>
        @elseif($questions[39]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[39]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[39]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number39" id="number394" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[39]->option4type == 'Text Only')
        <strong>{{ $questions[39]->option4text }}</strong>
        @elseif($questions[39]->option4type == 'Text and Image')
        <strong>{{ $questions[39]->option4text }}<br /><img src="{{ asset($questions[39]->option4image) }}"></strong>
        @elseif($questions[39]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[39]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[40]->id)
<div class="form-group float-left" id="q41">
      <div id="question"> 
        @if($questions[40]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage40" class="btn btn-info btn-round" onclick="showpassage({!! $questions[40]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id40" id="question_id40" value="{{ $questions[40]->id }}">
        <div class="">
          <input type="hidden" name="questiontype40" id="questiontype40" value="{{ $questions[40]->questiontype }}">
          @if($questions[40]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion40" id="textquestion40" value="{{ $questions[40]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[40]->textquestion }}</strong></p>
          @elseif($questions[40]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion40" id="textquestion40" value="{{ $questions[40]->textquestion }}">
          <input type="hidden" name="imagequestion40" id="imagequestion40" value="{{ $questions[40]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[40]->textquestion }}<br /><img src="{{ asset($questions[40]->imagequestion) }}" ></strong></p>
          @elseif($questions[40]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion40" id="imagequestion40" value="{{ $questions[40]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[40]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number40" id="number401" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[40]->option1type == 'Text Only')
        <strong>{{ $questions[40]->option1text }}</strong>
        @elseif($questions[40]->option1type == 'Text and Image')
        <strong>{{ $questions[40]->option1text }}<br /><img src="{{ asset($questions[40]->option1image) }}"></strong>
        @elseif($questions[40]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[40]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number40" id="number402" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[40]->option2type == 'Text Only')
        <strong>{{ $questions[40]->option2text }}</strong>
        @elseif($questions[40]->option2type == 'Text and Image')
        <strong>{{ $questions[40]->option2text }}<br /><img src="{{ asset($questions[40]->option2image) }}"></strong>
        @elseif($questions[40]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[40]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[40]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number40" id="number403" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[40]->option3type == 'Text Only')
        <strong>{{ $questions[40]->option3text }}</strong>
        @elseif($questions[40]->option3type == 'Text and Image')
        <strong>{{ $questions[40]->option3text }}<br /><img src="{{ asset($questions[40]->option3image) }}"></strong>
        @elseif($questions[40]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[40]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[40]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number40" id="number404" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[40]->option4type == 'Text Only')
        <strong>{{ $questions[40]->option4text }}</strong>
        @elseif($questions[40]->option4type == 'Text and Image')
        <strong>{{ $questions[40]->option4text }}<br /><img src="{{ asset($questions[40]->option4image) }}"></strong>
        @elseif($questions[40]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[40]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[41]->id)
<div class="form-group float-left" id="q42">
      <div id="question"> 
        @if($questions[41]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage41" class="btn btn-info btn-round" onclick="showpassage({!! $questions[41]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id41" id="question_id41" value="{{ $questions[41]->id }}">
        <div class="">
          <input type="hidden" name="questiontype41" id="questiontype41" value="{{ $questions[41]->questiontype }}">
          @if($questions[41]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion41" id="textquestion41" value="{{ $questions[41]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[41]->textquestion }}</strong></p>
          @elseif($questions[41]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion41" id="textquestion41" value="{{ $questions[41]->textquestion }}">
          <input type="hidden" name="imagequestion41" id="imagequestion41" value="{{ $questions[41]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[41]->textquestion }}<br /><img src="{{ asset($questions[41]->imagequestion) }}" ></strong></p>
          @elseif($questions[41]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion41" id="imagequestion41" value="{{ $questions[41]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[41]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number41" id="number411" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[41]->option1type == 'Text Only')
        <strong>{{ $questions[41]->option1text }}</strong>
        @elseif($questions[41]->option1type == 'Text and Image')
        <strong>{{ $questions[41]->option1text }}<br /><img src="{{ asset($questions[41]->option1image) }}"></strong>
        @elseif($questions[41]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[41]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number41" id="number412" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[41]->option2type == 'Text Only')
        <strong>{{ $questions[41]->option2text }}</strong>
        @elseif($questions[41]->option2type == 'Text and Image')
        <strong>{{ $questions[41]->option2text }}<br /><img src="{{ asset($questions[41]->option2image) }}"></strong>
        @elseif($questions[41]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[41]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[41]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number41" id="number413" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[41]->option3type == 'Text Only')
        <strong>{{ $questions[41]->option3text }}</strong>
        @elseif($questions[41]->option3type == 'Text and Image')
        <strong>{{ $questions[41]->option3text }}<br /><img src="{{ asset($questions[41]->option3image) }}"></strong>
        @elseif($questions[41]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[41]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[41]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number41" id="number414" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[41]->option4type == 'Text Only')
        <strong>{{ $questions[41]->option4text }}</strong>
        @elseif($questions[41]->option4type == 'Text and Image')
        <strong>{{ $questions[41]->option4text }}<br /><img src="{{ asset($questions[41]->option4image) }}"></strong>
        @elseif($questions[41]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[41]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[42]->id)
<div class="form-group float-left" id="q43">
      <div id="question"> 
        @if($questions[42]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage42" class="btn btn-info btn-round" onclick="showpassage({!! $questions[42]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id42" id="question_id42" value="{{ $questions[42]->id }}">
        <div class="">
          <input type="hidden" name="questiontype42" id="questiontype42" value="{{ $questions[42]->questiontype }}">
          @if($questions[42]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion42" id="textquestion42" value="{{ $questions[42]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[42]->textquestion }}</strong></p>
          @elseif($questions[42]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion42" id="textquestion42" value="{{ $questions[42]->textquestion }}">
          <input type="hidden" name="imagequestion42" id="imagequestion42" value="{{ $questions[42]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[42]->textquestion }}<br /><img src="{{ asset($questions[42]->imagequestion) }}" ></strong></p>
          @elseif($questions[42]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion42" id="imagequestion42" value="{{ $questions[42]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[42]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number42" id="number421" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[42]->option1type == 'Text Only')
        <strong>{{ $questions[42]->option1text }}</strong>
        @elseif($questions[42]->option1type == 'Text and Image')
        <strong>{{ $questions[42]->option1text }}<br /><img src="{{ asset($questions[42]->option1image) }}"></strong>
        @elseif($questions[42]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[42]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number42" id="number422" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[42]->option2type == 'Text Only')
        <strong>{{ $questions[42]->option2text }}</strong>
        @elseif($questions[42]->option2type == 'Text and Image')
        <strong>{{ $questions[42]->option2text }}<br /><img src="{{ asset($questions[42]->option2image) }}"></strong>
        @elseif($questions[42]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[42]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[42]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number42" id="number423" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[42]->option3type == 'Text Only')
        <strong>{{ $questions[42]->option3text }}</strong>
        @elseif($questions[42]->option3type == 'Text and Image')
        <strong>{{ $questions[42]->option3text }}<br /><img src="{{ asset($questions[42]->option3image) }}"></strong>
        @elseif($questions[42]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[42]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[42]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number42" id="number424" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[42]->option4type == 'Text Only')
        <strong>{{ $questions[42]->option4text }}</strong>
        @elseif($questions[42]->option4type == 'Text and Image')
        <strong>{{ $questions[42]->option4text }}<br /><img src="{{ asset($questions[42]->option4image) }}"></strong>
        @elseif($questions[42]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[42]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[43]->id)
<div class="form-group float-left" id="q44">
      <div id="question"> 
        @if($questions[43]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage43" class="btn btn-info btn-round" onclick="showpassage({!! $questions[43]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id43" id="question_id43" value="{{ $questions[43]->id }}">
        <div class="">
          <input type="hidden" name="questiontype43" id="questiontype43" value="{{ $questions[43]->questiontype }}">
          @if($questions[43]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion43" id="textquestion43" value="{{ $questions[43]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[43]->textquestion }}</strong></p>
          @elseif($questions[43]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion43" id="textquestion43" value="{{ $questions[43]->textquestion }}">
          <input type="hidden" name="imagequestion43" id="imagequestion43" value="{{ $questions[43]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[43]->textquestion }}<br /><img src="{{ asset($questions[43]->imagequestion) }}" ></strong></p>
          @elseif($questions[43]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion43" id="imagequestion43" value="{{ $questions[43]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[43]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number43" id="number431" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[43]->option1type == 'Text Only')
        <strong>{{ $questions[43]->option1text }}</strong>
        @elseif($questions[43]->option1type == 'Text and Image')
        <strong>{{ $questions[43]->option1text }}<br /><img src="{{ asset($questions[43]->option1image) }}"></strong>
        @elseif($questions[43]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[43]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number43" id="number432" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[43]->option2type == 'Text Only')
        <strong>{{ $questions[43]->option2text }}</strong>
        @elseif($questions[43]->option2type == 'Text and Image')
        <strong>{{ $questions[43]->option2text }}<br /><img src="{{ asset($questions[43]->option2image) }}"></strong>
        @elseif($questions[43]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[43]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[43]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number43" id="number433" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[43]->option3type == 'Text Only')
        <strong>{{ $questions[43]->option3text }}</strong>
        @elseif($questions[43]->option3type == 'Text and Image')
        <strong>{{ $questions[43]->option3text }}<br /><img src="{{ asset($questions[43]->option3image) }}"></strong>
        @elseif($questions[43]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[43]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[43]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number43" id="number434" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[43]->option4type == 'Text Only')
        <strong>{{ $questions[43]->option4text }}</strong>
        @elseif($questions[43]->option4type == 'Text and Image')
        <strong>{{ $questions[43]->option4text }}<br /><img src="{{ asset($questions[43]->option4image) }}"></strong>
        @elseif($questions[43]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[43]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[44]->id)
<div class="form-group float-left" id="q45">
      <div id="question"> 
        @if($questions[44]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage44" class="btn btn-info btn-round" onclick="showpassage({!! $questions[44]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id44" id="question_id44" value="{{ $questions[44]->id }}">
        <div class="">
          <input type="hidden" name="questiontype44" id="questiontype44" value="{{ $questions[44]->questiontype }}">
          @if($questions[44]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion44" id="textquestion44" value="{{ $questions[44]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[44]->textquestion }}</strong></p>
          @elseif($questions[44]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion44" id="textquestion44" value="{{ $questions[44]->textquestion }}">
          <input type="hidden" name="imagequestion44" id="imagequestion44" value="{{ $questions[44]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[44]->textquestion }}<br /><img src="{{ asset($questions[44]->imagequestion) }}" ></strong></p>
          @elseif($questions[44]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion44" id="imagequestion44" value="{{ $questions[44]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[44]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number44" id="number441" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[44]->option1type == 'Text Only')
        <strong>{{ $questions[44]->option1text }}</strong>
        @elseif($questions[44]->option1type == 'Text and Image')
        <strong>{{ $questions[44]->option1text }}<br /><img src="{{ asset($questions[44]->option1image) }}"></strong>
        @elseif($questions[44]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[44]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number44" id="number442" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[44]->option2type == 'Text Only')
        <strong>{{ $questions[44]->option2text }}</strong>
        @elseif($questions[44]->option2type == 'Text and Image')
        <strong>{{ $questions[44]->option2text }}<br /><img src="{{ asset($questions[44]->option2image) }}"></strong>
        @elseif($questions[44]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[44]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[44]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number44" id="number443" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[44]->option3type == 'Text Only')
        <strong>{{ $questions[44]->option3text }}</strong>
        @elseif($questions[44]->option3type == 'Text and Image')
        <strong>{{ $questions[44]->option3text }}<br /><img src="{{ asset($questions[44]->option3image) }}"></strong>
        @elseif($questions[44]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[44]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[44]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number44" id="number444" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[44]->option4type == 'Text Only')
        <strong>{{ $questions[44]->option4text }}</strong>
        @elseif($questions[44]->option4type == 'Text and Image')
        <strong>{{ $questions[44]->option4text }}<br /><img src="{{ asset($questions[44]->option4image) }}"></strong>
        @elseif($questions[44]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[44]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[45]->id)
<div class="form-group float-left" id="q46">
      <div id="question"> 
        @if($questions[45]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage45" class="btn btn-info btn-round" onclick="showpassage({!! $questions[45]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id45" id="question_id45" value="{{ $questions[45]->id }}">
        <div class="">
          <input type="hidden" name="questiontype45" id="questiontype45" value="{{ $questions[45]->questiontype }}">
          @if($questions[45]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion45" id="textquestion45" value="{{ $questions[45]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[45]->textquestion }}</strong></p>
          @elseif($questions[45]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion45" id="textquestion45" value="{{ $questions[45]->textquestion }}">
          <input type="hidden" name="imagequestion45" id="imagequestion45" value="{{ $questions[45]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[45]->textquestion }}<br /><img src="{{ asset($questions[45]->imagequestion) }}" ></strong></p>
          @elseif($questions[45]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion45" id="imagequestion45" value="{{ $questions[45]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[45]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number45" id="number451" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[45]->option1type == 'Text Only')
        <strong>{{ $questions[45]->option1text }}</strong>
        @elseif($questions[45]->option1type == 'Text and Image')
        <strong>{{ $questions[45]->option1text }}<br /><img src="{{ asset($questions[45]->option1image) }}"></strong>
        @elseif($questions[45]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[45]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number45" id="number452" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[45]->option2type == 'Text Only')
        <strong>{{ $questions[45]->option2text }}</strong>
        @elseif($questions[45]->option2type == 'Text and Image')
        <strong>{{ $questions[45]->option2text }}<br /><img src="{{ asset($questions[45]->option2image) }}"></strong>
        @elseif($questions[45]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[45]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[45]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number45" id="number453" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[45]->option3type == 'Text Only')
        <strong>{{ $questions[45]->option3text }}</strong>
        @elseif($questions[45]->option3type == 'Text and Image')
        <strong>{{ $questions[45]->option3text }}<br /><img src="{{ asset($questions[45]->option3image) }}"></strong>
        @elseif($questions[45]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[45]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[45]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number45" id="number454" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[45]->option4type == 'Text Only')
        <strong>{{ $questions[45]->option4text }}</strong>
        @elseif($questions[45]->option4type == 'Text and Image')
        <strong>{{ $questions[45]->option4text }}<br /><img src="{{ asset($questions[45]->option4image) }}"></strong>
        @elseif($questions[45]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[45]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[46]->id)
<div class="form-group float-left" id="q47">
      <div id="question"> 
        @if($questions[46]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage46" class="btn btn-info btn-round" onclick="showpassage({!! $questions[46]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id46" id="question_id46" value="{{ $questions[46]->id }}">
        <div class="">
          <input type="hidden" name="questiontype46" id="questiontype46" value="{{ $questions[46]->questiontype }}">
          @if($questions[46]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion46" id="textquestion46" value="{{ $questions[46]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[46]->textquestion }}</strong></p>
          @elseif($questions[46]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion46" id="textquestion46" value="{{ $questions[46]->textquestion }}">
          <input type="hidden" name="imagequestion46" id="imagequestion46" value="{{ $questions[46]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[46]->textquestion }}<br /><img src="{{ asset($questions[46]->imagequestion) }}" ></strong></p>
          @elseif($questions[46]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion46" id="imagequestion46" value="{{ $questions[46]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[46]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number46" id="number461" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[46]->option1type == 'Text Only')
        <strong>{{ $questions[46]->option1text }}</strong>
        @elseif($questions[46]->option1type == 'Text and Image')
        <strong>{{ $questions[46]->option1text }}<br /><img src="{{ asset($questions[46]->option1image) }}"></strong>
        @elseif($questions[46]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[46]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number46" id="number462" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[46]->option2type == 'Text Only')
        <strong>{{ $questions[46]->option2text }}</strong>
        @elseif($questions[46]->option2type == 'Text and Image')
        <strong>{{ $questions[46]->option2text }}<br /><img src="{{ asset($questions[46]->option2image) }}"></strong>
        @elseif($questions[46]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[46]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[46]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number46" id="number463" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[46]->option3type == 'Text Only')
        <strong>{{ $questions[46]->option3text }}</strong>
        @elseif($questions[46]->option3type == 'Text and Image')
        <strong>{{ $questions[46]->option3text }}<br /><img src="{{ asset($questions[46]->option3image) }}"></strong>
        @elseif($questions[46]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[46]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[46]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number46" id="number464" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[46]->option4type == 'Text Only')
        <strong>{{ $questions[46]->option4text }}</strong>
        @elseif($questions[46]->option4type == 'Text and Image')
        <strong>{{ $questions[46]->option4text }}<br /><img src="{{ asset($questions[46]->option4image) }}"></strong>
        @elseif($questions[46]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[46]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[47]->id)
<div class="form-group float-left" id="q48">
      <div id="question"> 
        @if($questions[47]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage47" class="btn btn-info btn-round" onclick="showpassage({!! $questions[47]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id47" id="question_id47" value="{{ $questions[47]->id }}">
        <div class="">
          <input type="hidden" name="questiontype47" id="questiontype47" value="{{ $questions[47]->questiontype }}">
          @if($questions[47]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion47" id="textquestion47" value="{{ $questions[47]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[47]->textquestion }}</strong></p>
          @elseif($questions[47]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion47" id="textquestion47" value="{{ $questions[47]->textquestion }}">
          <input type="hidden" name="imagequestion47" id="imagequestion47" value="{{ $questions[47]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[47]->textquestion }}<br /><img src="{{ asset($questions[47]->imagequestion) }}" ></strong></p>
          @elseif($questions[47]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion47" id="imagequestion47" value="{{ $questions[47]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[47]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number47" id="number471" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[47]->option1type == 'Text Only')
        <strong>{{ $questions[47]->option1text }}</strong>
        @elseif($questions[47]->option1type == 'Text and Image')
        <strong>{{ $questions[47]->option1text }}<br /><img src="{{ asset($questions[47]->option1image) }}"></strong>
        @elseif($questions[47]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[47]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number47" id="number472" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[47]->option2type == 'Text Only')
        <strong>{{ $questions[47]->option2text }}</strong>
        @elseif($questions[47]->option2type == 'Text and Image')
        <strong>{{ $questions[47]->option2text }}<br /><img src="{{ asset($questions[47]->option2image) }}"></strong>
        @elseif($questions[47]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[47]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[47]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number47" id="number473" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[47]->option3type == 'Text Only')
        <strong>{{ $questions[47]->option3text }}</strong>
        @elseif($questions[47]->option3type == 'Text and Image')
        <strong>{{ $questions[47]->option3text }}<br /><img src="{{ asset($questions[47]->option3image) }}"></strong>
        @elseif($questions[47]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[47]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[47]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number47" id="number474" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[47]->option4type == 'Text Only')
        <strong>{{ $questions[47]->option4text }}</strong>
        @elseif($questions[47]->option4type == 'Text and Image')
        <strong>{{ $questions[47]->option4text }}<br /><img src="{{ asset($questions[47]->option4image) }}"></strong>
        @elseif($questions[47]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[47]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[48]->id)
<div class="form-group float-left" id="q49">
      <div id="question"> 
        @if($questions[48]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage48" class="btn btn-info btn-round" onclick="showpassage({!! $questions[48]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id48" id="question_id48" value="{{ $questions[48]->id }}">
        <div class="">
          <input type="hidden" name="questiontype48" id="questiontype48" value="{{ $questions[48]->questiontype }}">
          @if($questions[48]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion48" id="textquestion48" value="{{ $questions[48]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[48]->textquestion }}</strong></p>
          @elseif($questions[48]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion48" id="textquestion48" value="{{ $questions[48]->textquestion }}">
          <input type="hidden" name="imagequestion48" id="imagequestion48" value="{{ $questions[48]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[48]->textquestion }}<br /><img src="{{ asset($questions[48]->imagequestion) }}" ></strong></p>
          @elseif($questions[48]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion48" id="imagequestion48" value="{{ $questions[48]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[48]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number48" id="number481" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[48]->option1type == 'Text Only')
        <strong>{{ $questions[48]->option1text }}</strong>
        @elseif($questions[48]->option1type == 'Text and Image')
        <strong>{{ $questions[48]->option1text }}<br /><img src="{{ asset($questions[48]->option1image) }}"></strong>
        @elseif($questions[48]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[48]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number48" id="number482" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[48]->option2type == 'Text Only')
        <strong>{{ $questions[48]->option2text }}</strong>
        @elseif($questions[48]->option2type == 'Text and Image')
        <strong>{{ $questions[48]->option2text }}<br /><img src="{{ asset($questions[48]->option2image) }}"></strong>
        @elseif($questions[48]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[48]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[48]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number48" id="number483" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[48]->option3type == 'Text Only')
        <strong>{{ $questions[48]->option3text }}</strong>
        @elseif($questions[48]->option3type == 'Text and Image')
        <strong>{{ $questions[48]->option3text }}<br /><img src="{{ asset($questions[48]->option3image) }}"></strong>
        @elseif($questions[48]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[48]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[48]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number48" id="number484" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[48]->option4type == 'Text Only')
        <strong>{{ $questions[48]->option4text }}</strong>
        @elseif($questions[48]->option4type == 'Text and Image')
        <strong>{{ $questions[48]->option4text }}<br /><img src="{{ asset($questions[48]->option4image) }}"></strong>
        @elseif($questions[48]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[48]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[49]->id)
<div class="form-group float-left" id="q50">
      <div id="question"> 
        @if($questions[49]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage49" class="btn btn-info btn-round" onclick="showpassage({!! $questions[49]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id49" id="question_id49" value="{{ $questions[49]->id }}">
        <div class="">
          <input type="hidden" name="questiontype49" id="questiontype49" value="{{ $questions[49]->questiontype }}">
          @if($questions[49]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion49" id="textquestion49" value="{{ $questions[49]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[49]->textquestion }}</strong></p>
          @elseif($questions[49]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion49" id="textquestion49" value="{{ $questions[49]->textquestion }}">
          <input type="hidden" name="imagequestion49" id="imagequestion49" value="{{ $questions[49]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[49]->textquestion }}<br /><img src="{{ asset($questions[49]->imagequestion) }}" ></strong></p>
          @elseif($questions[49]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion49" id="imagequestion49" value="{{ $questions[49]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[49]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number49" id="number491" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[49]->option1type == 'Text Only')
        <strong>{{ $questions[49]->option1text }}</strong>
        @elseif($questions[49]->option1type == 'Text and Image')
        <strong>{{ $questions[49]->option1text }}<br /><img src="{{ asset($questions[49]->option1image) }}"></strong>
        @elseif($questions[49]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[49]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number49" id="number492" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[49]->option2type == 'Text Only')
        <strong>{{ $questions[49]->option2text }}</strong>
        @elseif($questions[49]->option2type == 'Text and Image')
        <strong>{{ $questions[49]->option2text }}<br /><img src="{{ asset($questions[49]->option2image) }}"></strong>
        @elseif($questions[49]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[49]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[49]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number49" id="number493" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[49]->option3type == 'Text Only')
        <strong>{{ $questions[49]->option3text }}</strong>
        @elseif($questions[49]->option3type == 'Text and Image')
        <strong>{{ $questions[49]->option3text }}<br /><img src="{{ asset($questions[49]->option3image) }}"></strong>
        @elseif($questions[49]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[49]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[49]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number49" id="number494" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[49]->option4type == 'Text Only')
        <strong>{{ $questions[49]->option4text }}</strong>
        @elseif($questions[49]->option4type == 'Text and Image')
        <strong>{{ $questions[49]->option4text }}<br /><img src="{{ asset($questions[49]->option4image) }}"></strong>
        @elseif($questions[49]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[49]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[50]->id)
<div class="form-group float-left" id="q51">
      <div id="question"> 
        @if($questions[50]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage50" class="btn btn-info btn-round" onclick="showpassage({!! $questions[50]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id50" id="question_id50" value="{{ $questions[50]->id }}">
        <div class="">
          <input type="hidden" name="questiontype50" id="questiontype50" value="{{ $questions[50]->questiontype }}">
          @if($questions[50]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion50" id="textquestion50" value="{{ $questions[50]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[50]->textquestion }}</strong></p>
          @elseif($questions[50]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion50" id="textquestion50" value="{{ $questions[50]->textquestion }}">
          <input type="hidden" name="imagequestion50" id="imagequestion50" value="{{ $questions[50]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[50]->textquestion }}<br /><img src="{{ asset($questions[50]->imagequestion) }}" ></strong></p>
          @elseif($questions[50]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion50" id="imagequestion50" value="{{ $questions[50]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[50]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number50" id="number501" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[50]->option1type == 'Text Only')
        <strong>{{ $questions[50]->option1text }}</strong>
        @elseif($questions[50]->option1type == 'Text and Image')
        <strong>{{ $questions[50]->option1text }}<br /><img src="{{ asset($questions[50]->option1image) }}"></strong>
        @elseif($questions[50]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[50]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number50" id="number502" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[50]->option2type == 'Text Only')
        <strong>{{ $questions[50]->option2text }}</strong>
        @elseif($questions[50]->option2type == 'Text and Image')
        <strong>{{ $questions[50]->option2text }}<br /><img src="{{ asset($questions[50]->option2image) }}"></strong>
        @elseif($questions[50]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[50]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[50]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number50" id="number503" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[50]->option3type == 'Text Only')
        <strong>{{ $questions[50]->option3text }}</strong>
        @elseif($questions[50]->option3type == 'Text and Image')
        <strong>{{ $questions[50]->option3text }}<br /><img src="{{ asset($questions[50]->option3image) }}"></strong>
        @elseif($questions[50]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[50]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[50]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number50" id="number504" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[50]->option4type == 'Text Only')
        <strong>{{ $questions[50]->option4text }}</strong>
        @elseif($questions[50]->option4type == 'Text and Image')
        <strong>{{ $questions[50]->option4text }}<br /><img src="{{ asset($questions[50]->option4image) }}"></strong>
        @elseif($questions[50]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[50]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[51]->id)
<div class="form-group float-left" id="q52">
      <div id="question"> 
        @if($questions[51]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage51" class="btn btn-info btn-round" onclick="showpassage({!! $questions[51]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id51" id="question_id51" value="{{ $questions[51]->id }}">
        <div class="">
          <input type="hidden" name="questiontype51" id="questiontype51" value="{{ $questions[51]->questiontype }}">
          @if($questions[51]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion51" id="textquestion51" value="{{ $questions[51]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[51]->textquestion }}</strong></p>
          @elseif($questions[51]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion51" id="textquestion51" value="{{ $questions[51]->textquestion }}">
          <input type="hidden" name="imagequestion51" id="imagequestion51" value="{{ $questions[51]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[51]->textquestion }}<br /><img src="{{ asset($questions[51]->imagequestion) }}" ></strong></p>
          @elseif($questions[51]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion51" id="imagequestion51" value="{{ $questions[51]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[51]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number51" id="number511" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[51]->option1type == 'Text Only')
        <strong>{{ $questions[51]->option1text }}</strong>
        @elseif($questions[51]->option1type == 'Text and Image')
        <strong>{{ $questions[51]->option1text }}<br /><img src="{{ asset($questions[51]->option1image) }}"></strong>
        @elseif($questions[51]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[51]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number51" id="number512" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[51]->option2type == 'Text Only')
        <strong>{{ $questions[51]->option2text }}</strong>
        @elseif($questions[51]->option2type == 'Text and Image')
        <strong>{{ $questions[51]->option2text }}<br /><img src="{{ asset($questions[51]->option2image) }}"></strong>
        @elseif($questions[51]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[51]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[51]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number51" id="number513" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[51]->option3type == 'Text Only')
        <strong>{{ $questions[51]->option3text }}</strong>
        @elseif($questions[51]->option3type == 'Text and Image')
        <strong>{{ $questions[51]->option3text }}<br /><img src="{{ asset($questions[51]->option3image) }}"></strong>
        @elseif($questions[51]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[51]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[51]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number51" id="number514" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[51]->option4type == 'Text Only')
        <strong>{{ $questions[51]->option4text }}</strong>
        @elseif($questions[51]->option4type == 'Text and Image')
        <strong>{{ $questions[51]->option4text }}<br /><img src="{{ asset($questions[51]->option4image) }}"></strong>
        @elseif($questions[51]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[51]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[52]->id)
<div class="form-group float-left" id="q53">
      <div id="question"> 
        @if($questions[52]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage52" class="btn btn-info btn-round" onclick="showpassage({!! $questions[52]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id52" id="question_id52" value="{{ $questions[52]->id }}">
        <div class="">
          <input type="hidden" name="questiontype52" id="questiontype52" value="{{ $questions[52]->questiontype }}">
          @if($questions[52]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion52" id="textquestion52" value="{{ $questions[52]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[52]->textquestion }}</strong></p>
          @elseif($questions[52]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion52" id="textquestion52" value="{{ $questions[52]->textquestion }}">
          <input type="hidden" name="imagequestion52" id="imagequestion52" value="{{ $questions[52]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[52]->textquestion }}<br /><img src="{{ asset($questions[52]->imagequestion) }}" ></strong></p>
          @elseif($questions[52]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion52" id="imagequestion52" value="{{ $questions[52]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[52]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number52" id="number521" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[52]->option1type == 'Text Only')
        <strong>{{ $questions[52]->option1text }}</strong>
        @elseif($questions[52]->option1type == 'Text and Image')
        <strong>{{ $questions[52]->option1text }}<br /><img src="{{ asset($questions[52]->option1image) }}"></strong>
        @elseif($questions[52]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[52]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number52" id="number522" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[52]->option2type == 'Text Only')
        <strong>{{ $questions[52]->option2text }}</strong>
        @elseif($questions[52]->option2type == 'Text and Image')
        <strong>{{ $questions[52]->option2text }}<br /><img src="{{ asset($questions[52]->option2image) }}"></strong>
        @elseif($questions[52]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[52]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[52]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number52" id="number523" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[52]->option3type == 'Text Only')
        <strong>{{ $questions[52]->option3text }}</strong>
        @elseif($questions[52]->option3type == 'Text and Image')
        <strong>{{ $questions[52]->option3text }}<br /><img src="{{ asset($questions[52]->option3image) }}"></strong>
        @elseif($questions[52]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[52]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[52]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number52" id="number524" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[52]->option4type == 'Text Only')
        <strong>{{ $questions[52]->option4text }}</strong>
        @elseif($questions[52]->option4type == 'Text and Image')
        <strong>{{ $questions[52]->option4text }}<br /><img src="{{ asset($questions[52]->option4image) }}"></strong>
        @elseif($questions[52]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[52]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[53]->id)
<div class="form-group float-left" id="q54">
      <div id="question"> 
        @if($questions[53]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage53" class="btn btn-info btn-round" onclick="showpassage({!! $questions[53]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id53" id="question_id53" value="{{ $questions[53]->id }}">
        <div class="">
          <input type="hidden" name="questiontype53" id="questiontype53" value="{{ $questions[53]->questiontype }}">
          @if($questions[53]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion53" id="textquestion53" value="{{ $questions[53]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[53]->textquestion }}</strong></p>
          @elseif($questions[53]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion53" id="textquestion53" value="{{ $questions[53]->textquestion }}">
          <input type="hidden" name="imagequestion53" id="imagequestion53" value="{{ $questions[53]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[53]->textquestion }}<br /><img src="{{ asset($questions[53]->imagequestion) }}" ></strong></p>
          @elseif($questions[53]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion53" id="imagequestion53" value="{{ $questions[53]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[53]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number53" id="number531" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[53]->option1type == 'Text Only')
        <strong>{{ $questions[53]->option1text }}</strong>
        @elseif($questions[53]->option1type == 'Text and Image')
        <strong>{{ $questions[53]->option1text }}<br /><img src="{{ asset($questions[53]->option1image) }}"></strong>
        @elseif($questions[53]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[53]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number53" id="number532" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[53]->option2type == 'Text Only')
        <strong>{{ $questions[53]->option2text }}</strong>
        @elseif($questions[53]->option2type == 'Text and Image')
        <strong>{{ $questions[53]->option2text }}<br /><img src="{{ asset($questions[53]->option2image) }}"></strong>
        @elseif($questions[53]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[53]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[53]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number53" id="number533" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[53]->option3type == 'Text Only')
        <strong>{{ $questions[53]->option3text }}</strong>
        @elseif($questions[53]->option3type == 'Text and Image')
        <strong>{{ $questions[53]->option3text }}<br /><img src="{{ asset($questions[53]->option3image) }}"></strong>
        @elseif($questions[53]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[53]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[53]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number53" id="number534" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[53]->option4type == 'Text Only')
        <strong>{{ $questions[53]->option4text }}</strong>
        @elseif($questions[53]->option4type == 'Text and Image')
        <strong>{{ $questions[53]->option4text }}<br /><img src="{{ asset($questions[53]->option4image) }}"></strong>
        @elseif($questions[53]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[53]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[54]->id)
<div class="form-group float-left" id="q55">
      <div id="question"> 
        @if($questions[54]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage54" class="btn btn-info btn-round" onclick="showpassage({!! $questions[54]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id54" id="question_id54" value="{{ $questions[54]->id }}">
        <div class="">
          <input type="hidden" name="questiontype54" id="questiontype54" value="{{ $questions[54]->questiontype }}">
          @if($questions[54]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion54" id="textquestion54" value="{{ $questions[54]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[54]->textquestion }}</strong></p>
          @elseif($questions[54]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion54" id="textquestion54" value="{{ $questions[54]->textquestion }}">
          <input type="hidden" name="imagequestion54" id="imagequestion54" value="{{ $questions[54]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[54]->textquestion }}<br /><img src="{{ asset($questions[54]->imagequestion) }}" ></strong></p>
          @elseif($questions[54]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion54" id="imagequestion54" value="{{ $questions[54]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[54]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number54" id="number541" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[54]->option1type == 'Text Only')
        <strong>{{ $questions[54]->option1text }}</strong>
        @elseif($questions[54]->option1type == 'Text and Image')
        <strong>{{ $questions[54]->option1text }}<br /><img src="{{ asset($questions[54]->option1image) }}"></strong>
        @elseif($questions[54]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[54]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number54" id="number542" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[54]->option2type == 'Text Only')
        <strong>{{ $questions[54]->option2text }}</strong>
        @elseif($questions[54]->option2type == 'Text and Image')
        <strong>{{ $questions[54]->option2text }}<br /><img src="{{ asset($questions[54]->option2image) }}"></strong>
        @elseif($questions[54]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[54]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[54]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number54" id="number543" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[54]->option3type == 'Text Only')
        <strong>{{ $questions[54]->option3text }}</strong>
        @elseif($questions[54]->option3type == 'Text and Image')
        <strong>{{ $questions[54]->option3text }}<br /><img src="{{ asset($questions[54]->option3image) }}"></strong>
        @elseif($questions[54]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[54]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[54]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number54" id="number544" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[54]->option4type == 'Text Only')
        <strong>{{ $questions[54]->option4text }}</strong>
        @elseif($questions[54]->option4type == 'Text and Image')
        <strong>{{ $questions[54]->option4text }}<br /><img src="{{ asset($questions[54]->option4image) }}"></strong>
        @elseif($questions[54]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[54]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[55]->id)
<div class="form-group float-left" id="q56">
      <div id="question"> 
        @if($questions[55]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage55" class="btn btn-info btn-round" onclick="showpassage({!! $questions[55]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id55" id="question_id55" value="{{ $questions[55]->id }}">
        <div class="">
          <input type="hidden" name="questiontype55" id="questiontype55" value="{{ $questions[55]->questiontype }}">
          @if($questions[55]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion55" id="textquestion55" value="{{ $questions[55]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[55]->textquestion }}</strong></p>
          @elseif($questions[55]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion55" id="textquestion55" value="{{ $questions[55]->textquestion }}">
          <input type="hidden" name="imagequestion55" id="imagequestion55" value="{{ $questions[55]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[55]->textquestion }}<br /><img src="{{ asset($questions[55]->imagequestion) }}" ></strong></p>
          @elseif($questions[55]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion55" id="imagequestion55" value="{{ $questions[55]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[55]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number55" id="number551" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[55]->option1type == 'Text Only')
        <strong>{{ $questions[55]->option1text }}</strong>
        @elseif($questions[55]->option1type == 'Text and Image')
        <strong>{{ $questions[55]->option1text }}<br /><img src="{{ asset($questions[55]->option1image) }}"></strong>
        @elseif($questions[55]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[55]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number55" id="number552" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[55]->option2type == 'Text Only')
        <strong>{{ $questions[55]->option2text }}</strong>
        @elseif($questions[55]->option2type == 'Text and Image')
        <strong>{{ $questions[55]->option2text }}<br /><img src="{{ asset($questions[55]->option2image) }}"></strong>
        @elseif($questions[55]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[55]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[55]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number55" id="number553" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[55]->option3type == 'Text Only')
        <strong>{{ $questions[55]->option3text }}</strong>
        @elseif($questions[55]->option3type == 'Text and Image')
        <strong>{{ $questions[55]->option3text }}<br /><img src="{{ asset($questions[55]->option3image) }}"></strong>
        @elseif($questions[55]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[55]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[55]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number55" id="number554" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[55]->option4type == 'Text Only')
        <strong>{{ $questions[55]->option4text }}</strong>
        @elseif($questions[55]->option4type == 'Text and Image')
        <strong>{{ $questions[55]->option4text }}<br /><img src="{{ asset($questions[55]->option4image) }}"></strong>
        @elseif($questions[55]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[55]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[56]->id)
<div class="form-group float-left" id="q57">
      <div id="question"> 
        @if($questions[56]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage56" class="btn btn-info btn-round" onclick="showpassage({!! $questions[56]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id56" id="question_id56" value="{{ $questions[56]->id }}">
        <div class="">
          <input type="hidden" name="questiontype56" id="questiontype56" value="{{ $questions[56]->questiontype }}">
          @if($questions[56]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion56" id="textquestion56" value="{{ $questions[56]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[56]->textquestion }}</strong></p>
          @elseif($questions[56]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion56" id="textquestion56" value="{{ $questions[56]->textquestion }}">
          <input type="hidden" name="imagequestion56" id="imagequestion56" value="{{ $questions[56]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[56]->textquestion }}<br /><img src="{{ asset($questions[56]->imagequestion) }}" ></strong></p>
          @elseif($questions[56]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion56" id="imagequestion56" value="{{ $questions[56]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[56]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number56" id="number561" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[56]->option1type == 'Text Only')
        <strong>{{ $questions[56]->option1text }}</strong>
        @elseif($questions[56]->option1type == 'Text and Image')
        <strong>{{ $questions[56]->option1text }}<br /><img src="{{ asset($questions[56]->option1image) }}"></strong>
        @elseif($questions[56]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[56]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number56" id="number562" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[56]->option2type == 'Text Only')
        <strong>{{ $questions[56]->option2text }}</strong>
        @elseif($questions[56]->option2type == 'Text and Image')
        <strong>{{ $questions[56]->option2text }}<br /><img src="{{ asset($questions[56]->option2image) }}"></strong>
        @elseif($questions[56]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[56]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[56]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number56" id="number563" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[56]->option3type == 'Text Only')
        <strong>{{ $questions[56]->option3text }}</strong>
        @elseif($questions[56]->option3type == 'Text and Image')
        <strong>{{ $questions[56]->option3text }}<br /><img src="{{ asset($questions[56]->option3image) }}"></strong>
        @elseif($questions[56]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[56]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[56]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number56" id="number564" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[56]->option4type == 'Text Only')
        <strong>{{ $questions[56]->option4text }}</strong>
        @elseif($questions[56]->option4type == 'Text and Image')
        <strong>{{ $questions[56]->option4text }}<br /><img src="{{ asset($questions[56]->option4image) }}"></strong>
        @elseif($questions[56]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[56]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[57]->id)
<div class="form-group float-left" id="q58">
      <div id="question"> 
        @if($questions[57]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage57" class="btn btn-info btn-round" onclick="showpassage({!! $questions[57]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id57" id="question_id57" value="{{ $questions[57]->id }}">
        <div class="">
          <input type="hidden" name="questiontype57" id="questiontype57" value="{{ $questions[57]->questiontype }}">
          @if($questions[57]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion57" id="textquestion57" value="{{ $questions[57]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[57]->textquestion }}</strong></p>
          @elseif($questions[57]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion57" id="textquestion57" value="{{ $questions[57]->textquestion }}">
          <input type="hidden" name="imagequestion57" id="imagequestion57" value="{{ $questions[57]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[57]->textquestion }}<br /><img src="{{ asset($questions[57]->imagequestion) }}" ></strong></p>
          @elseif($questions[57]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion57" id="imagequestion57" value="{{ $questions[57]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[57]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number57" id="number571" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[57]->option1type == 'Text Only')
        <strong>{{ $questions[57]->option1text }}</strong>
        @elseif($questions[57]->option1type == 'Text and Image')
        <strong>{{ $questions[57]->option1text }}<br /><img src="{{ asset($questions[57]->option1image) }}"></strong>
        @elseif($questions[57]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[57]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number57" id="number572" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[57]->option2type == 'Text Only')
        <strong>{{ $questions[57]->option2text }}</strong>
        @elseif($questions[57]->option2type == 'Text and Image')
        <strong>{{ $questions[57]->option2text }}<br /><img src="{{ asset($questions[57]->option2image) }}"></strong>
        @elseif($questions[57]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[57]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[57]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number57" id="number573" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[57]->option3type == 'Text Only')
        <strong>{{ $questions[57]->option3text }}</strong>
        @elseif($questions[57]->option3type == 'Text and Image')
        <strong>{{ $questions[57]->option3text }}<br /><img src="{{ asset($questions[57]->option3image) }}"></strong>
        @elseif($questions[57]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[57]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[57]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number57" id="number574" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[57]->option4type == 'Text Only')
        <strong>{{ $questions[57]->option4text }}</strong>
        @elseif($questions[57]->option4type == 'Text and Image')
        <strong>{{ $questions[57]->option4text }}<br /><img src="{{ asset($questions[57]->option4image) }}"></strong>
        @elseif($questions[57]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[57]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[58]->id)
<div class="form-group float-left" id="q59">
      <div id="question"> 
        @if($questions[58]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage58" class="btn btn-info btn-round" onclick="showpassage({!! $questions[58]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id58" id="question_id58" value="{{ $questions[58]->id }}">
        <div class="">
          <input type="hidden" name="questiontype58" id="questiontype58" value="{{ $questions[58]->questiontype }}">
          @if($questions[58]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion58" id="textquestion58" value="{{ $questions[58]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[58]->textquestion }}</strong></p>
          @elseif($questions[58]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion58" id="textquestion58" value="{{ $questions[58]->textquestion }}">
          <input type="hidden" name="imagequestion58" id="imagequestion58" value="{{ $questions[58]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[58]->textquestion }}<br /><img src="{{ asset($questions[58]->imagequestion) }}" ></strong></p>
          @elseif($questions[58]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion58" id="imagequestion58" value="{{ $questions[58]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[58]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number58" id="number581" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[58]->option1type == 'Text Only')
        <strong>{{ $questions[58]->option1text }}</strong>
        @elseif($questions[58]->option1type == 'Text and Image')
        <strong>{{ $questions[58]->option1text }}<br /><img src="{{ asset($questions[58]->option1image) }}"></strong>
        @elseif($questions[58]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[58]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number58" id="number582" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[58]->option2type == 'Text Only')
        <strong>{{ $questions[58]->option2text }}</strong>
        @elseif($questions[58]->option2type == 'Text and Image')
        <strong>{{ $questions[58]->option2text }}<br /><img src="{{ asset($questions[58]->option2image) }}"></strong>
        @elseif($questions[58]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[58]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[58]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number58" id="number583" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[58]->option3type == 'Text Only')
        <strong>{{ $questions[58]->option3text }}</strong>
        @elseif($questions[58]->option3type == 'Text and Image')
        <strong>{{ $questions[58]->option3text }}<br /><img src="{{ asset($questions[58]->option3image) }}"></strong>
        @elseif($questions[58]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[58]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[58]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number58" id="number584" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[58]->option4type == 'Text Only')
        <strong>{{ $questions[58]->option4text }}</strong>
        @elseif($questions[58]->option4type == 'Text and Image')
        <strong>{{ $questions[58]->option4text }}<br /><img src="{{ asset($questions[58]->option4image) }}"></strong>
        @elseif($questions[58]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[58]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[59]->id)
<div class="form-group float-left" id="q60">
      <div id="question"> 
        @if($questions[59]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage59" class="btn btn-info btn-round" onclick="showpassage({!! $questions[59]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id59" id="question_id59" value="{{ $questions[59]->id }}">
        <div class="">
          <input type="hidden" name="questiontype59" id="questiontype59" value="{{ $questions[59]->questiontype }}">
          @if($questions[59]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion59" id="textquestion59" value="{{ $questions[59]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[59]->textquestion }}</strong></p>
          @elseif($questions[59]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion59" id="textquestion59" value="{{ $questions[59]->textquestion }}">
          <input type="hidden" name="imagequestion59" id="imagequestion59" value="{{ $questions[59]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[59]->textquestion }}<br /><img src="{{ asset($questions[59]->imagequestion) }}" ></strong></p>
          @elseif($questions[59]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion59" id="imagequestion59" value="{{ $questions[59]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[59]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number59" id="number591" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[59]->option1type == 'Text Only')
        <strong>{{ $questions[59]->option1text }}</strong>
        @elseif($questions[59]->option1type == 'Text and Image')
        <strong>{{ $questions[59]->option1text }}<br /><img src="{{ asset($questions[59]->option1image) }}"></strong>
        @elseif($questions[59]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[59]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number59" id="number592" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[59]->option2type == 'Text Only')
        <strong>{{ $questions[59]->option2text }}</strong>
        @elseif($questions[59]->option2type == 'Text and Image')
        <strong>{{ $questions[59]->option2text }}<br /><img src="{{ asset($questions[59]->option2image) }}"></strong>
        @elseif($questions[59]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[59]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[59]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number59" id="number593" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[59]->option3type == 'Text Only')
        <strong>{{ $questions[59]->option3text }}</strong>
        @elseif($questions[59]->option3type == 'Text and Image')
        <strong>{{ $questions[59]->option3text }}<br /><img src="{{ asset($questions[59]->option3image) }}"></strong>
        @elseif($questions[59]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[59]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[59]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number59" id="number594" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[59]->option4type == 'Text Only')
        <strong>{{ $questions[59]->option4text }}</strong>
        @elseif($questions[59]->option4type == 'Text and Image')
        <strong>{{ $questions[59]->option4text }}<br /><img src="{{ asset($questions[59]->option4image) }}"></strong>
        @elseif($questions[59]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[59]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[60]->id)
<div class="form-group float-left" id="q61">
      <div id="question"> 
        @if($questions[60]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage60" class="btn btn-info btn-round" onclick="showpassage({!! $questions[60]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id60" id="question_id60" value="{{ $questions[60]->id }}">
        <div class="">
          <input type="hidden" name="questiontype60" id="questiontype60" value="{{ $questions[60]->questiontype }}">
          @if($questions[60]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion60" id="textquestion60" value="{{ $questions[60]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[60]->textquestion }}</strong></p>
          @elseif($questions[60]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion60" id="textquestion60" value="{{ $questions[60]->textquestion }}">
          <input type="hidden" name="imagequestion60" id="imagequestion60" value="{{ $questions[60]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[60]->textquestion }}<br /><img src="{{ asset($questions[60]->imagequestion) }}" ></strong></p>
          @elseif($questions[60]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion60" id="imagequestion60" value="{{ $questions[60]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[60]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number60" id="number601" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[60]->option1type == 'Text Only')
        <strong>{{ $questions[60]->option1text }}</strong>
        @elseif($questions[60]->option1type == 'Text and Image')
        <strong>{{ $questions[60]->option1text }}<br /><img src="{{ asset($questions[60]->option1image) }}"></strong>
        @elseif($questions[60]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[60]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number60" id="number602" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[60]->option2type == 'Text Only')
        <strong>{{ $questions[60]->option2text }}</strong>
        @elseif($questions[60]->option2type == 'Text and Image')
        <strong>{{ $questions[60]->option2text }}<br /><img src="{{ asset($questions[60]->option2image) }}"></strong>
        @elseif($questions[60]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[60]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[60]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number60" id="number603" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[60]->option3type == 'Text Only')
        <strong>{{ $questions[60]->option3text }}</strong>
        @elseif($questions[60]->option3type == 'Text and Image')
        <strong>{{ $questions[60]->option3text }}<br /><img src="{{ asset($questions[60]->option3image) }}"></strong>
        @elseif($questions[60]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[60]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[60]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number60" id="number604" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[60]->option4type == 'Text Only')
        <strong>{{ $questions[60]->option4text }}</strong>
        @elseif($questions[60]->option4type == 'Text and Image')
        <strong>{{ $questions[60]->option4text }}<br /><img src="{{ asset($questions[60]->option4image) }}"></strong>
        @elseif($questions[60]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[60]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[61]->id)
<div class="form-group float-left" id="q62">
      <div id="question"> 
        @if($questions[61]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage61" class="btn btn-info btn-round" onclick="showpassage({!! $questions[61]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id61" id="question_id61" value="{{ $questions[61]->id }}">
        <div class="">
          <input type="hidden" name="questiontype61" id="questiontype61" value="{{ $questions[61]->questiontype }}">
          @if($questions[61]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion61" id="textquestion61" value="{{ $questions[61]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[61]->textquestion }}</strong></p>
          @elseif($questions[61]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion61" id="textquestion61" value="{{ $questions[61]->textquestion }}">
          <input type="hidden" name="imagequestion61" id="imagequestion61" value="{{ $questions[61]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[61]->textquestion }}<br /><img src="{{ asset($questions[61]->imagequestion) }}" ></strong></p>
          @elseif($questions[61]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion61" id="imagequestion61" value="{{ $questions[61]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[61]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number61" id="number611" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[61]->option1type == 'Text Only')
        <strong>{{ $questions[61]->option1text }}</strong>
        @elseif($questions[61]->option1type == 'Text and Image')
        <strong>{{ $questions[61]->option1text }}<br /><img src="{{ asset($questions[61]->option1image) }}"></strong>
        @elseif($questions[61]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[61]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number61" id="number612" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[61]->option2type == 'Text Only')
        <strong>{{ $questions[61]->option2text }}</strong>
        @elseif($questions[61]->option2type == 'Text and Image')
        <strong>{{ $questions[61]->option2text }}<br /><img src="{{ asset($questions[61]->option2image) }}"></strong>
        @elseif($questions[61]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[61]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[61]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number61" id="number613" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[61]->option3type == 'Text Only')
        <strong>{{ $questions[61]->option3text }}</strong>
        @elseif($questions[61]->option3type == 'Text and Image')
        <strong>{{ $questions[61]->option3text }}<br /><img src="{{ asset($questions[61]->option3image) }}"></strong>
        @elseif($questions[61]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[61]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[61]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number61" id="number614" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[61]->option4type == 'Text Only')
        <strong>{{ $questions[61]->option4text }}</strong>
        @elseif($questions[61]->option4type == 'Text and Image')
        <strong>{{ $questions[61]->option4text }}<br /><img src="{{ asset($questions[61]->option4image) }}"></strong>
        @elseif($questions[61]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[61]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[62]->id)
<div class="form-group float-left" id="q63">
      <div id="question"> 
        @if($questions[62]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage62" class="btn btn-info btn-round" onclick="showpassage({!! $questions[62]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id62" id="question_id62" value="{{ $questions[62]->id }}">
        <div class="">
          <input type="hidden" name="questiontype62" id="questiontype62" value="{{ $questions[62]->questiontype }}">
          @if($questions[62]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion62" id="textquestion62" value="{{ $questions[62]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[62]->textquestion }}</strong></p>
          @elseif($questions[62]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion62" id="textquestion62" value="{{ $questions[62]->textquestion }}">
          <input type="hidden" name="imagequestion62" id="imagequestion62" value="{{ $questions[62]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[62]->textquestion }}<br /><img src="{{ asset($questions[62]->imagequestion) }}" ></strong></p>
          @elseif($questions[62]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion62" id="imagequestion62" value="{{ $questions[62]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[62]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number62" id="number621" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[62]->option1type == 'Text Only')
        <strong>{{ $questions[62]->option1text }}</strong>
        @elseif($questions[62]->option1type == 'Text and Image')
        <strong>{{ $questions[62]->option1text }}<br /><img src="{{ asset($questions[62]->option1image) }}"></strong>
        @elseif($questions[62]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[62]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number62" id="number622" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[62]->option2type == 'Text Only')
        <strong>{{ $questions[62]->option2text }}</strong>
        @elseif($questions[62]->option2type == 'Text and Image')
        <strong>{{ $questions[62]->option2text }}<br /><img src="{{ asset($questions[62]->option2image) }}"></strong>
        @elseif($questions[62]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[62]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[62]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number62" id="number623" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[62]->option3type == 'Text Only')
        <strong>{{ $questions[62]->option3text }}</strong>
        @elseif($questions[62]->option3type == 'Text and Image')
        <strong>{{ $questions[62]->option3text }}<br /><img src="{{ asset($questions[62]->option3image) }}"></strong>
        @elseif($questions[62]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[62]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[62]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number62" id="number624" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[62]->option4type == 'Text Only')
        <strong>{{ $questions[62]->option4text }}</strong>
        @elseif($questions[62]->option4type == 'Text and Image')
        <strong>{{ $questions[62]->option4text }}<br /><img src="{{ asset($questions[62]->option4image) }}"></strong>
        @elseif($questions[62]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[62]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[63]->id)
<div class="form-group float-left" id="q64">
      <div id="question"> 
        @if($questions[63]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage63" class="btn btn-info btn-round" onclick="showpassage({!! $questions[63]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id63" id="question_id63" value="{{ $questions[63]->id }}">
        <div class="">
          <input type="hidden" name="questiontype63" id="questiontype63" value="{{ $questions[63]->questiontype }}">
          @if($questions[63]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion63" id="textquestion63" value="{{ $questions[63]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[63]->textquestion }}</strong></p>
          @elseif($questions[63]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion63" id="textquestion63" value="{{ $questions[63]->textquestion }}">
          <input type="hidden" name="imagequestion63" id="imagequestion63" value="{{ $questions[63]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[63]->textquestion }}<br /><img src="{{ asset($questions[63]->imagequestion) }}" ></strong></p>
          @elseif($questions[63]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion63" id="imagequestion63" value="{{ $questions[63]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[63]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number63" id="number631" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[63]->option1type == 'Text Only')
        <strong>{{ $questions[63]->option1text }}</strong>
        @elseif($questions[63]->option1type == 'Text and Image')
        <strong>{{ $questions[63]->option1text }}<br /><img src="{{ asset($questions[63]->option1image) }}"></strong>
        @elseif($questions[63]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[63]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number63" id="number632" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[63]->option2type == 'Text Only')
        <strong>{{ $questions[63]->option2text }}</strong>
        @elseif($questions[63]->option2type == 'Text and Image')
        <strong>{{ $questions[63]->option2text }}<br /><img src="{{ asset($questions[63]->option2image) }}"></strong>
        @elseif($questions[63]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[63]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[63]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number63" id="number633" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[63]->option3type == 'Text Only')
        <strong>{{ $questions[63]->option3text }}</strong>
        @elseif($questions[63]->option3type == 'Text and Image')
        <strong>{{ $questions[63]->option3text }}<br /><img src="{{ asset($questions[63]->option3image) }}"></strong>
        @elseif($questions[63]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[63]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[63]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number63" id="number634" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[63]->option4type == 'Text Only')
        <strong>{{ $questions[63]->option4text }}</strong>
        @elseif($questions[63]->option4type == 'Text and Image')
        <strong>{{ $questions[63]->option4text }}<br /><img src="{{ asset($questions[63]->option4image) }}"></strong>
        @elseif($questions[63]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[63]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[64]->id)
<div class="form-group float-left" id="q65">
      <div id="question"> 
        @if($questions[64]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage64" class="btn btn-info btn-round" onclick="showpassage({!! $questions[64]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id64" id="question_id64" value="{{ $questions[64]->id }}">
        <div class="">
          <input type="hidden" name="questiontype64" id="questiontype64" value="{{ $questions[64]->questiontype }}">
          @if($questions[64]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion64" id="textquestion64" value="{{ $questions[64]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[64]->textquestion }}</strong></p>
          @elseif($questions[64]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion64" id="textquestion64" value="{{ $questions[64]->textquestion }}">
          <input type="hidden" name="imagequestion64" id="imagequestion64" value="{{ $questions[64]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[64]->textquestion }}<br /><img src="{{ asset($questions[64]->imagequestion) }}" ></strong></p>
          @elseif($questions[64]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion64" id="imagequestion64" value="{{ $questions[64]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[64]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number64" id="number641" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[64]->option1type == 'Text Only')
        <strong>{{ $questions[64]->option1text }}</strong>
        @elseif($questions[64]->option1type == 'Text and Image')
        <strong>{{ $questions[64]->option1text }}<br /><img src="{{ asset($questions[64]->option1image) }}"></strong>
        @elseif($questions[64]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[64]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number64" id="number642" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[64]->option2type == 'Text Only')
        <strong>{{ $questions[64]->option2text }}</strong>
        @elseif($questions[64]->option2type == 'Text and Image')
        <strong>{{ $questions[64]->option2text }}<br /><img src="{{ asset($questions[64]->option2image) }}"></strong>
        @elseif($questions[64]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[64]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[64]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number64" id="number643" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[64]->option3type == 'Text Only')
        <strong>{{ $questions[64]->option3text }}</strong>
        @elseif($questions[64]->option3type == 'Text and Image')
        <strong>{{ $questions[64]->option3text }}<br /><img src="{{ asset($questions[64]->option3image) }}"></strong>
        @elseif($questions[64]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[64]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[64]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number64" id="number644" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[64]->option4type == 'Text Only')
        <strong>{{ $questions[64]->option4text }}</strong>
        @elseif($questions[64]->option4type == 'Text and Image')
        <strong>{{ $questions[64]->option4text }}<br /><img src="{{ asset($questions[64]->option4image) }}"></strong>
        @elseif($questions[64]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[64]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[65]->id)
<div class="form-group float-left" id="q66">
      <div id="question"> 
        @if($questions[65]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage65" class="btn btn-info btn-round" onclick="showpassage({!! $questions[65]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id65" id="question_id65" value="{{ $questions[65]->id }}">
        <div class="">
          <input type="hidden" name="questiontype65" id="questiontype65" value="{{ $questions[65]->questiontype }}">
          @if($questions[65]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion65" id="textquestion65" value="{{ $questions[65]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[65]->textquestion }}</strong></p>
          @elseif($questions[65]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion65" id="textquestion65" value="{{ $questions[65]->textquestion }}">
          <input type="hidden" name="imagequestion65" id="imagequestion65" value="{{ $questions[65]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[65]->textquestion }}<br /><img src="{{ asset($questions[65]->imagequestion) }}" ></strong></p>
          @elseif($questions[65]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion65" id="imagequestion65" value="{{ $questions[65]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[65]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number65" id="number651" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[65]->option1type == 'Text Only')
        <strong>{{ $questions[65]->option1text }}</strong>
        @elseif($questions[65]->option1type == 'Text and Image')
        <strong>{{ $questions[65]->option1text }}<br /><img src="{{ asset($questions[65]->option1image) }}"></strong>
        @elseif($questions[65]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[65]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number65" id="number652" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[65]->option2type == 'Text Only')
        <strong>{{ $questions[65]->option2text }}</strong>
        @elseif($questions[65]->option2type == 'Text and Image')
        <strong>{{ $questions[65]->option2text }}<br /><img src="{{ asset($questions[65]->option2image) }}"></strong>
        @elseif($questions[65]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[65]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[65]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number65" id="number653" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[65]->option3type == 'Text Only')
        <strong>{{ $questions[65]->option3text }}</strong>
        @elseif($questions[65]->option3type == 'Text and Image')
        <strong>{{ $questions[65]->option3text }}<br /><img src="{{ asset($questions[65]->option3image) }}"></strong>
        @elseif($questions[65]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[65]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[65]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number65" id="number654" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[65]->option4type == 'Text Only')
        <strong>{{ $questions[65]->option4text }}</strong>
        @elseif($questions[65]->option4type == 'Text and Image')
        <strong>{{ $questions[65]->option4text }}<br /><img src="{{ asset($questions[65]->option4image) }}"></strong>
        @elseif($questions[65]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[65]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[66]->id)
<div class="form-group float-left" id="q67">
      <div id="question"> 
        @if($questions[66]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage66" class="btn btn-info btn-round" onclick="showpassage({!! $questions[66]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id66" id="question_id66" value="{{ $questions[66]->id }}">
        <div class="">
          <input type="hidden" name="questiontype66" id="questiontype66" value="{{ $questions[66]->questiontype }}">
          @if($questions[66]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion66" id="textquestion66" value="{{ $questions[66]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[66]->textquestion }}</strong></p>
          @elseif($questions[66]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion66" id="textquestion66" value="{{ $questions[66]->textquestion }}">
          <input type="hidden" name="imagequestion66" id="imagequestion66" value="{{ $questions[66]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[66]->textquestion }}<br /><img src="{{ asset($questions[66]->imagequestion) }}" ></strong></p>
          @elseif($questions[66]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion66" id="imagequestion66" value="{{ $questions[66]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[66]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number66" id="number661" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[66]->option1type == 'Text Only')
        <strong>{{ $questions[66]->option1text }}</strong>
        @elseif($questions[66]->option1type == 'Text and Image')
        <strong>{{ $questions[66]->option1text }}<br /><img src="{{ asset($questions[66]->option1image) }}"></strong>
        @elseif($questions[66]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[66]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number66" id="number662" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[66]->option2type == 'Text Only')
        <strong>{{ $questions[66]->option2text }}</strong>
        @elseif($questions[66]->option2type == 'Text and Image')
        <strong>{{ $questions[66]->option2text }}<br /><img src="{{ asset($questions[66]->option2image) }}"></strong>
        @elseif($questions[66]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[66]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[66]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number66" id="number663" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[66]->option3type == 'Text Only')
        <strong>{{ $questions[66]->option3text }}</strong>
        @elseif($questions[66]->option3type == 'Text and Image')
        <strong>{{ $questions[66]->option3text }}<br /><img src="{{ asset($questions[66]->option3image) }}"></strong>
        @elseif($questions[66]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[66]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[66]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number66" id="number664" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[66]->option4type == 'Text Only')
        <strong>{{ $questions[66]->option4text }}</strong>
        @elseif($questions[66]->option4type == 'Text and Image')
        <strong>{{ $questions[66]->option4text }}<br /><img src="{{ asset($questions[66]->option4image) }}"></strong>
        @elseif($questions[66]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[66]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[67]->id)
<div class="form-group float-left" id="q68">
      <div id="question"> 
        @if($questions[67]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage67" class="btn btn-info btn-round" onclick="showpassage({!! $questions[67]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id67" id="question_id67" value="{{ $questions[67]->id }}">
        <div class="">
          <input type="hidden" name="questiontype67" id="questiontype67" value="{{ $questions[67]->questiontype }}">
          @if($questions[67]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion67" id="textquestion67" value="{{ $questions[67]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[67]->textquestion }}</strong></p>
          @elseif($questions[67]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion67" id="textquestion67" value="{{ $questions[67]->textquestion }}">
          <input type="hidden" name="imagequestion67" id="imagequestion67" value="{{ $questions[67]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[67]->textquestion }}<br /><img src="{{ asset($questions[67]->imagequestion) }}" ></strong></p>
          @elseif($questions[67]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion67" id="imagequestion67" value="{{ $questions[67]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[67]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number67" id="number671" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[67]->option1type == 'Text Only')
        <strong>{{ $questions[67]->option1text }}</strong>
        @elseif($questions[67]->option1type == 'Text and Image')
        <strong>{{ $questions[67]->option1text }}<br /><img src="{{ asset($questions[67]->option1image) }}"></strong>
        @elseif($questions[67]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[67]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number67" id="number672" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[67]->option2type == 'Text Only')
        <strong>{{ $questions[67]->option2text }}</strong>
        @elseif($questions[67]->option2type == 'Text and Image')
        <strong>{{ $questions[67]->option2text }}<br /><img src="{{ asset($questions[67]->option2image) }}"></strong>
        @elseif($questions[67]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[67]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[67]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number67" id="number673" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[67]->option3type == 'Text Only')
        <strong>{{ $questions[67]->option3text }}</strong>
        @elseif($questions[67]->option3type == 'Text and Image')
        <strong>{{ $questions[67]->option3text }}<br /><img src="{{ asset($questions[67]->option3image) }}"></strong>
        @elseif($questions[67]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[67]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[67]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number67" id="number674" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[67]->option4type == 'Text Only')
        <strong>{{ $questions[67]->option4text }}</strong>
        @elseif($questions[67]->option4type == 'Text and Image')
        <strong>{{ $questions[67]->option4text }}<br /><img src="{{ asset($questions[67]->option4image) }}"></strong>
        @elseif($questions[67]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[67]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

@isset($questions[68]->id)
<div class="form-group float-left" id="q69">
      <div id="question"> 
        @if($questions[68]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage68" class="btn btn-info btn-round" onclick="showpassage({!! $questions[68]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id68" id="question_id68" value="{{ $questions[68]->id }}">
        <div class="">
          <input type="hidden" name="questiontype68" id="questiontype68" value="{{ $questions[68]->questiontype }}">
          @if($questions[68]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion68" id="textquestion68" value="{{ $questions[68]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[68]->textquestion }}</strong></p>
          @elseif($questions[68]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion68" id="textquestion68" value="{{ $questions[68]->textquestion }}">
          <input type="hidden" name="imagequestion68" id="imagequestion68" value="{{ $questions[68]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[68]->textquestion }}<br /><img src="{{ asset($questions[68]->imagequestion) }}" ></strong></p>
          @elseif($questions[68]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion68" id="imagequestion68" value="{{ $questions[68]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[68]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number68" id="number681" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[68]->option1type == 'Text Only')
        <strong>{{ $questions[68]->option1text }}</strong>
        @elseif($questions[68]->option1type == 'Text and Image')
        <strong>{{ $questions[68]->option1text }}<br /><img src="{{ asset($questions[68]->option1image) }}"></strong>
        @elseif($questions[68]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[68]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number68" id="number682" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[68]->option2type == 'Text Only')
        <strong>{{ $questions[68]->option2text }}</strong>
        @elseif($questions[68]->option2type == 'Text and Image')
        <strong>{{ $questions[68]->option2text }}<br /><img src="{{ asset($questions[68]->option2image) }}"></strong>
        @elseif($questions[68]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[68]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[68]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number68" id="number683" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[68]->option3type == 'Text Only')
        <strong>{{ $questions[68]->option3text }}</strong>
        @elseif($questions[68]->option3type == 'Text and Image')
        <strong>{{ $questions[68]->option3text }}<br /><img src="{{ asset($questions[68]->option3image) }}"></strong>
        @elseif($questions[68]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[68]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[68]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number68" id="number684" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[68]->option4type == 'Text Only')
        <strong>{{ $questions[68]->option4text }}</strong>
        @elseif($questions[68]->option4type == 'Text and Image')
        <strong>{{ $questions[68]->option4text }}<br /><img src="{{ asset($questions[68]->option4image) }}"></strong>
        @elseif($questions[68]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[68]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset


@isset($questions[69]->id)
<div class="form-group float-left" id="q70">
      <div id="question"> 
        @if($questions[69]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage69" class="btn btn-info btn-round" onclick="showpassage({!! $questions[69]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id69" id="question_id69" value="{{ $questions[69]->id }}">
        <div class="">
          <input type="hidden" name="questiontype69" id="questiontype69" value="{{ $questions[69]->questiontype }}">
          @if($questions[69]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion69" id="textquestion69" value="{{ $questions[69]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[69]->textquestion }}</strong></p>
          @elseif($questions[69]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion69" id="textquestion69" value="{{ $questions[69]->textquestion }}">
          <input type="hidden" name="imagequestion69" id="imagequestion69" value="{{ $questions[69]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[69]->textquestion }}<br /><img src="{{ asset($questions[69]->imagequestion) }}" ></strong></p>
          @elseif($questions[69]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion69" id="imagequestion69" value="{{ $questions[69]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[69]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number69" id="number691" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[69]->option1type == 'Text Only')
        <strong>{{ $questions[69]->option1text }}</strong>
        @elseif($questions[69]->option1type == 'Text and Image')
        <strong>{{ $questions[69]->option1text }}<br /><img src="{{ asset($questions[69]->option1image) }}"></strong>
        @elseif($questions[69]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[69]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number69" id="number692" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[69]->option2type == 'Text Only')
        <strong>{{ $questions[69]->option2text }}</strong>
        @elseif($questions[69]->option2type == 'Text and Image')
        <strong>{{ $questions[69]->option2text }}<br /><img src="{{ asset($questions[69]->option2image) }}"></strong>
        @elseif($questions[69]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[69]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[69]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number69" id="number693" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[69]->option3type == 'Text Only')
        <strong>{{ $questions[69]->option3text }}</strong>
        @elseif($questions[69]->option3type == 'Text and Image')
        <strong>{{ $questions[69]->option3text }}<br /><img src="{{ asset($questions[69]->option3image) }}"></strong>
        @elseif($questions[69]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[69]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[69]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number69" id="number694" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[69]->option4type == 'Text Only')
        <strong>{{ $questions[69]->option4text }}</strong>
        @elseif($questions[69]->option4type == 'Text and Image')
        <strong>{{ $questions[69]->option4text }}<br /><img src="{{ asset($questions[69]->option4image) }}"></strong>
        @elseif($questions[69]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[69]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset

<!--
@isset($questions[70]->id)
<div class="form-group float-left" id="q71">
      <div id="question"> 
        @if($questions[70]->passage != NULL)
        <div class="">
          <p class="form-control-static"><button id="passage70" class="btn btn-info btn-round" onclick="showpassage({!! $questions[70]->passage !!})">Read Passage</button></p>
        </div>
        @endif
        <input type="hidden" name="question_id70" id="question_id70" value="{{ $questions[70]->id }}">
        <div class="">
          <input type="hidden" name="questiontype70" id="questiontype70" value="{{ $questions[70]->questiontype }}">
          @if($questions[70]->questiontype == 'Text Only')
          <input type="hidden" name="textquestion70" id="textquestion70" value="{{ $questions[70]->textquestion }}">
          <p class="form-control-static"><strong>{{ $questions[70]->textquestion }}</strong></p>
          @elseif($questions[70]->questiontype == 'Text and Image')
          <input type="hidden" name="textquestion70" id="textquestion70" value="{{ $questions[70]->textquestion }}">
          <input type="hidden" name="imagequestion70" id="imagequestion70" value="{{ $questions[70]->imagequestion }}">
          <p class="form-control-static"><strong>{{ $questions[70]->textquestion }}<br /><img src="{{ asset($questions[70]->imagequestion) }}" ></strong></p>
          @elseif($questions[70]->questiontype == 'Image Only')
          <input type="hidden" name="imagequestion70" id="imagequestion70" value="{{ $questions[70]->imagequestion }}">
          <p class="form-control-static"><img src="{{ asset($questions[70]->imagequestion) }}"></p>
          @endif
        </div>
    </div>
    
    <div id="options">
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number70" id="number701" value="Option 1">
        <span class="form-check-sign"></span>
        @if($questions[70]->option1type == 'Text Only')
        <strong>{{ $questions[70]->option1text }}</strong>
        @elseif($questions[70]->option1type == 'Text and Image')
        <strong>{{ $questions[70]->option1text }}<br /><img src="{{ asset($questions[70]->option1image) }}"></strong>
        @elseif($questions[70]->option1type == 'Image Only')
        <strong><img src="{{ asset($questions[70]->option1image) }}"></strong>
        @endif
      </label>
      </div>
      <div class="form-check form-check-radio">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="number70" id="number702" value="Option 2">
          <span class="form-check-sign"></span>
        @if($questions[70]->option2type == 'Text Only')
        <strong>{{ $questions[70]->option2text }}</strong>
        @elseif($questions[70]->option2type == 'Text and Image')
        <strong>{{ $questions[70]->option2text }}<br /><img src="{{ asset($questions[70]->option2image) }}"></strong>
        @elseif($questions[70]->option2type == 'Image Only')
        <strong><img src="{{ asset($questions[70]->option2image) }}"></strong>
        @endif
        </label>
      </div>
      @if(!empty($questions[70]->option3type))
      <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number70" id="number703" value="Option 3">
        <span class="form-check-sign"></span>
        @if($questions[70]->option3type == 'Text Only')
        <strong>{{ $questions[70]->option3text }}</strong>
        @elseif($questions[70]->option3type == 'Text and Image')
        <strong>{{ $questions[70]->option3text }}<br /><img src="{{ asset($questions[70]->option3image) }}"></strong>
        @elseif($questions[70]->option3type == 'Image Only')
        <strong><img src="{{ asset($questions[70]->option3image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
    @if(!empty($questions[70]->option4type))
    <div class="form-check form-check-radio">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="number70" id="number704" value="Option 4">
        <span class="form-check-sign"></span>
        @if($questions[70]->option4type == 'Text Only')
        <strong>{{ $questions[70]->option4text }}</strong>
        @elseif($questions[70]->option4type == 'Text and Image')
        <strong>{{ $questions[70]->option4text }}<br /><img src="{{ asset($questions[70]->option4image) }}"></strong>
        @elseif($questions[70]->option4type == 'Image Only')
        <strong><img src = "{{ asset($questions[70]->option4image) }}"></strong>
        @endif
      </label>
    </div>
    @endif
</div>

</div>
@endisset
-->


