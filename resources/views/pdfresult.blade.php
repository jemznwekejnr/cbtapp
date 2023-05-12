<html>
    <head>
        <title>AML/CFT Test Result</title>
    </head>
    <body>
        <center><img src="{{ asset('assets/img/cfc-header.png') }}" width="70%"></center>
        <table cellpadding="0" cellspacing="20" border="0" style="width:100%">
            <tr>
                <td style="width:25%">Full Name<br /><b>{{ $test_result[0]->name }}</b></td>
                <td style="width:25%">Email Address<br /><b>{{ $test_result[0]->email }}</b></td>
                <td style="width:25%">Organization<br /><b>{{ $test_result[0]->organization }}</b></td>
                <td style="width:25%">Designation<br /><b>{{ $test_result[0]->designation }}</b></td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="20" border="0" style="width:100%">
            <tr>
                <td style="width:20%">Exam Type<br /><b>{{ $test_result[0]->exam_type }}</b></td>
                <td style="width:15%">Course<br /><b>{{ $test_result[0]->subject }}</b></td>
                <td style="width:5%">Year<br /><b>{{ $test_result[0]->year }}</b></td>
                <td style="width:15%">Status<br /><b>{{ $test_result[0]->status }}</b></td>
                <td style="width:15%">Total Questions<br /><b>{{ $test_result[0]->total_score }}</b></td>
                <td style="width:15%">Correct Answers<br /><b>{{ $test_result[0]->user_score }}</b></td>
                <td style="width:15%">Grade Score<br /><b>{{ $test_result[0]->user_percentage }}%</b></td>
            </tr>
        </table>
        <br /><br />
                @php $i = 1 @endphp
                @foreach($tests as $test)
                <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
                    <tr>
                        <td style="width:5%">Q{{ $i++ }}</td>
                        <td style="width:95%"><b>@php echo htmlspecialchars(app\Http\Controllers\testController::getQuestion($test->question_id), ENT_QUOTES); @endphp</b></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td style="width:10%">Option 1: </td>
                        <td style="width:90%">@php echo htmlspecialchars(app\Http\Controllers\testController::getOption1($test->question_id), ENT_QUOTES); @endphp</td>
                    </tr>
                    <tr>
                        <td style="width:10%">Option 2: </td>
                        <td style="width:90%">@php echo htmlspecialchars(app\Http\Controllers\testController::getOption2($test->question_id), ENT_QUOTES); @endphp</td>
                    </tr>
                    @if(!empty(app\Http\Controllers\testController::getOption3($test->question_id)))
                    <tr>
                        <td style="width:10%">Option 3: </td>
                        <td style="width:90%">@php echo htmlspecialchars(app\Http\Controllers\testController::getOption3($test->question_id), ENT_QUOTES); @endphp</td>
                    </tr>
                    @endif
                    @if(!empty(app\Http\Controllers\testController::getOption4($test->question_id)))
                    <tr>
                        <td style="width:10%">Option 4: </td>
                        <td style="width:90%">@php echo htmlspecialchars(app\Http\Controllers\testController::getOption4($test->question_id), ENT_QUOTES); @endphp</td>
                    </tr>
                    @endif
                    </table>
                    <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
                    <tr>
                        
                            @if(app\Http\Controllers\testController::userAnswer($test->test_id, $test->question_id) == app\Http\Controllers\testController::correctAnswer($test->question_id))
                              <td style="width:50%">
                                <div style="padding: 12px; background-color: #006200; color: #fff; box-radius: 5px">Correct: <b>@php echo app\Http\Controllers\testController::userAnswer($test->test_id, $test->question_id); @endphp</b></div>
                              </td>
                            @else
                            <td style="width:50%">
                                <div style="padding: 12px; background-color: #FF0000; color: #fff; box-radius: 5px">Wrong: <b>@php echo app\Http\Controllers\testController::userAnswer($test->test_id, $test->question_id); @endphp</b></div>
                            </td>
                            <td style="width:10%"><center> | </center></td>
                            <td style="width:50%">
                              <div style="padding: 12px; background-color: #006200; color: #fff; box-radius: 5px">Correct Answer: <b>@php echo app\Http\Controllers\testController::correctAnswer($test->question_id); @endphp</b></div>
                             </td>
                            @endif
                    </tr>
                </table>
                <br /><br />
                @endforeach
            
        <br /><br /><br />
        <p>©{{ date('Y') }} AML/CFT CBT platform powered by <a href="https://andjemztech.com">AndJemz Tech</a></p>
    </body>
</html>