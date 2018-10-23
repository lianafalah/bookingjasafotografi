@extends('admin.template')
@section('content')
<section class="content-header">
      <h1 style="text-align: center;">
        Input Data Paket

      </h1>
      
    </section>
<section class="content">
<div class="row">
          <div class="col-lg-12">
            <section class="panel" > 
    
      <div class="panel-body">
        <div class="form">
          <form class="form-validate form-horizontal" action="{{ Route('paket_email.store') }}" id="feedback_form" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group ">
              <label for="email" class="control-label col-lg-2">Email</label>
                <div class="col-lg-10">
                  <input class="form-control" id="email" type="text" name="email" required />
                </div>
            </div>        
            <div class="form-group ">
              <label for="subject" class="control-label col-lg-2">Subject</label>
                <div class="col-lg-10">
                  <input class="form-control" id="subject" name="subject" type="text" required />
                </div>
            </div>
            <div class="form-group">
              <label for="message" class="control-label col-lg-2">message</label>
                <div class="col-lg-10">
                  <input class="form-control" id="message" type="text" name="message" required />
                </div>
            </div>
            
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit">Save</button>
                <button type="reset" class="btn btn-default" onclick="history.go(-1);">Cancel</button>
              </div>
            </div>
          </form>
      </div>
      </div>
      </section>
</div>
</div>
</section>

@endsection
