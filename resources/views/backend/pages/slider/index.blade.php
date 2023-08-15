@extends('backend.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic Table</h4>
          <p class="card-description">
           <a href="{{route('panel.slider.create')}}" class="btn btn-primary">Add</a>
          </p>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                 <th>image</th>
                  <th>Profile</th>
                  <th>name</th>
                  <th>link</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @if (!empty($sliders) && $sliders->count() > 0)
                  @foreach ($sliders as $slider)
                    <tr>
                      <td class="py-1">
                        <img src="{{ asset($slider->image) }}" alt="image" />
                      </td>
                      <td>{{ $slider->name }}</td>
                      <td>{{ $slider->content ?? '' }}</td>
                      <td>{{ $slider->link }}</td>
                      <td>
                     <div class="checkbox" data-idx="{{$slider->id}}">
                      <label>
                      <input type="checkbox" class="status" data-id="{{$slider->id}}" data-on="Active" data-off="Deactive"  data-onstyle="success" data-offstyle="danger" {{ $slider->status ==  '1' ?   'checked' : '' }}  data-toggle="toggle">
                       </label>
                      </div>
                      </td>
                      <td>

                        <form action="{{ route('panel.slider.destroy', $slider->id) }}" method="POST">
                            <a href="{{ route('panel.slider.edit', $slider->id) }}" class="btn btn-primary">Edit</a>
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>

                        </form>

                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('customjs')
<script>

   $(document).on('change','.status',function(e) {


    //var id=$(this).closest('.checkbox')[0].attr(item-id);
    var id=e.target.dataset.id;
    var statu= $(this).prop('checked');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "{{route('panel.slider.status')}}",
        data: {
            id:id,
            statu:statu
        },
        success: function(response){

            if(response.status== true){
                alertify.success("status activited");
            }else{
                alertify.error("status deactivited");
            }
        }
    });

   });
  </script>

@endsection

