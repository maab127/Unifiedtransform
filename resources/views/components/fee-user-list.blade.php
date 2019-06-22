{{$users->links()}}
<div class="table-responsive">
<table class="table table-bordered table-data-div table-condensed table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Code</th>
      <th scope="col">Full Name</th>
      @foreach ($users as $user)
        @if($user->role == 'student')
          @if (!Session::has('section-attendance'))
            <th scope="col">Class</th>
            <th scope="col">Section</th>
            <th scope="col">Father</th>
            <th scope="col">Mother</th>
          @endif
        @endif
        @break($loop->first)
      @endforeach
      <th scope="col">Registration</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $key=>$user)
    <tr>
      <th scope="row">{{ ($current_page-1) * $per_page + $key + 1 }}</th>
      <td><small>{{$user->student_code}}</small></td>
      <td>
        <small>
          @if(!empty($user->pic_path))
            <img src="{{asset('01-progress.gif')}}" data-src="{{url($user->pic_path)}}" style="border-radius: 50%;" width="25px" height="25px">
          @else
            @if(strtolower($user->gender) == 'male')
              <img src="{{asset('01-progress.gif')}}" data-src="https://png.icons8.com/dusk/50/000000/user.png" style="border-radius: 50%;" width="25px" height="25px">&nbsp;
            @else
              <img src="{{asset('01-progress.gif')}}" data-src="https://png.icons8.com/dusk/50/000000/user-female.png" style="border-radius: 50%;" width="25px" height="25px">&nbsp;
            @endif
          @endif
          <a href="{{url('user/'.$user->student_code)}}">
            {{$user->name}}</a>
          </small></td>
      @if($user->role == 'student')
        @if (!Session::has('section-attendance'))
        <td><small>{{$user->section->class->class_number}} {{!empty($user->group)? '- '.$user->group:''}}</small></td>
        <td style="white-space: nowrap;"><small>{{$user->section->section_number}}
          </small>
        </td>
        <td><small>{{$user->studentInfo['father_name']}}</small></td>
        <td><small>{{$user->studentInfo['mother_name']}}</small></td>
        @endif
      @endif
      <td>
        <a class="btn btn-xs btn-success" href="{{url('add-user-registration-fee/'.$user->id)}}">Registration</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$users->links()}}
