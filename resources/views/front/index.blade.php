@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ route('store') }}" method="POST">
                        <div class="card-header bg-success">
                            <h3 style="color:#fff;margin:0;padding:0;">Email Sender</h3>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('warning'))
                            <div class="alert alert-danger">
                                {{ session('warning') }}
                            </div>
                        @endif

                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label>Həftəni seçin</label>
                                <select name="week_day" class="form-control">
                                    <option value="Monday">Bazar ertəsi</option>
                                    <option value="Tuesday">Çərşənbə axşamı</option>
                                    <option value="Wednesday">Çərşənbə</option>
                                    <option value="Thursday">Cümə axşamı</option>
                                    <option value="Friday">Cümə</option>
                                    <option value="Saturday">Şənbə</option>
                                    <option value="Sunday">Bazar günü</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Saatı yazın</label>
                                <input type="text" name="time" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mövzu</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mesajınız</label>
                                <input type="text" name="content" class="form-control">
                            </div>
                            <input type="hidden" name="isSend" value="0">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Göndər</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
