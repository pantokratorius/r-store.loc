@extends('layouts.layout')

@section('content')

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Назад</h1>

    </div>


  </section>

<div class="box" style="">
    <div class="box-head" style="margin-bottom: 5px">	<h2>Форма добавления прайса</h2></div>
    <div class="box-content">
        <form action="{{route('import.save')}}" method="post"  id="addForm">
          @csrf
            <div class="form-row" >
                <div class="form-item">
                    <textarea rows="10" cols="50" type="text" name="data"></textarea>
                </div>
            </div>
            <input type="submit" class="button_save" value="Сохранить" />
          </div>
            <div class="form-row">

        </form>
        @if($res)
        <form action="{{route('import.price.save')}}" method="post">
          @csrf
                @foreach($res as $k=>$v) 
            <div style="width: 100%; display: flex; align-items: center; background: #f1f0df; padding: 20px "><h2>{{ $k }}</h2><input type="text" name="{{ $k }}" value="@isset($v['nacenka']) {{$v['nacenka']}} @endisset" style="width: 80px; margin-left: 20px; height: 27px" /></div>
                    @foreach($v as $key=>$val) 
                        @if($key != 'nacenka' && $key != 'real_name')
                               <div class="form-row" style="margin: 0 0 0px 0px;  padding: 15px; border: 1px solid rgb(221, 221, 221); display:flex; justify-content: space-between">
                                <div style="display: flex">
                                  <span class="line"></span>
                                    <p class="form-label" style="text-wrap: nowrap;">{{$val['real_name'] }}:</p>
                                </div>
                                    <div class="form-item">
                                        <span>{{$val['price']}} </span>
                                        <input type="text" name="{{$key}}" value="@isset($val['nacenka']) {{$val['nacenka']}} @endisset" style="width: 80px; margin-left: 20px; height: 27px">
                                    </div>
                                </div>
                        @endif
                    @endforeach
                @endforeach
                   <div class="form-row">
                       <input type="hidden" name="type" value="edit" />
                       <input type="submit" class="button_save bottom" value="Сохранить" /></div>
                    </form>
    @endif
               
    </div>
                                                            
    

            <br clear="all" />
            <label>&nbsp;</label>
        
        <div class="clear"></div>
    </div>


    @endsection

    @push('styles')
        <style>
    @font-face {
  font-family: NotoColorEmojiLimited;
  unicode-range: U+1F1E6-1F1FF;
  src: url(https://raw.githack.com/googlefonts/noto-emoji/main/fonts/NotoColorEmoji.ttf);
}
textarea, form p, form label, .form-row p, .form-row label {
  font-family: 'NotoColorEmojiLimited', -apple-system, BlinkMacSystemFont,
  'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
  'Segoe UI Emoji', 'Segoe UI Symbol';
}

            .line {
                background: #005c4c;
                width: 25px;
                height: 1px;
                border-radius: 5px;
                margin-right: 15px;
                margin-top: 14px;
                margin-left: 20px;
            }

            .button_save {
                background: #47c363;
                padding: 5px 15px;
                border-radius: 8px;
                margin-top: 10px;
                color: white;
            }

            #addForm {
              display: flex;
              flex-direction: column;
              width: fit-content;
              align-items: flex-end;
              margin-bottom: 50px;
            }

            input.bottom {
              margin-left: 500px;
            }

            

        </style>

    @endpush