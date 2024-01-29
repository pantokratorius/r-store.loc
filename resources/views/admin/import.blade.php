@extends('layouts.layout')

@section('content')

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Portfolio Item</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All Portfolio Items</h4>
              <div class="card-header-action">
                <a href="" class="btn btn-success">Create New <i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="card-body">
                {{-- {{ $dataTable->table() }} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<div class="box" style="">
    <div class="box-head" style="margin-bottom: 5px">	<h2>Форма добавления прайса</h2></div>
    <div class="box-content">
        <form action="" method="post"  id="addForm">
            <div class="form-row" style="margin-bottom: 50px;">
                <div class="form-item">
                    <textarea rows="10" cols="50" type="text" name="data"></textarea>
                </div>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" class="button green" value="Сохранить" style='width:150px; float:right; margin-top:10px;' /></div>
            <div class="form-row">

        </form>
        {{-- {{dd($res)}} --}}
    @if($res)
        <form action="" method="post">
                @foreach($res as $k=>$v) 
            <div style="width: 100%; display: flex; align-items: center; background: #f1f0df; padding: 20px "><h2><?=$k ?></h2><input type="text" name="<?=$k ?>" value="<?=$v['nacenka']?>" style="width: 80px; margin-left: 20px; height: 27px" /></div>
                    @foreach($v as $key=>$val) 
                    {{-- {{dump($key)}} --}}
                        @if($key != 'nacenka' && $key != 'real_name')
                               <div class="form-row" style="margin: 0 0 0px 0px; background: #dff1df; padding: 15px">
                                <span class="line"></span>
                                    <p class="form-label" style="text-wrap: nowrap;"><?=$val['real_name'] ?>:</p>
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
                       <input type="submit" class="button green" value="Сохранить" style='width:150px; float:right; margin-top:-30px;' /></div>
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
            .line {
                background: #005c4c;
                width: 25px;
                height: 4px;
                border-radius: 5px;
                margin-right: 15px;
                margin-top: 10px;
            }
        </style>

    @endpush