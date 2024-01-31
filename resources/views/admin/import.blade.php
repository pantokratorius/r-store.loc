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
        <form action="" method="post"  id="addForm">
            <div class="form-row" >
                <div class="form-item">
                    <textarea rows="10" cols="50" type="text" name="data"></textarea>
                </div>
            </div>
            <input type="submit" class="button_save" value="Сохранить" />
          </div>
            <div class="form-row">

        </form>

               
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