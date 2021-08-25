@extends('layouts.app')

@section('content')
    
    <div class="container">
    <div class="row">
        <div class="col-6">
             
            <dl>
                <dt>銘柄</dt>
                <dd>{{ $item->bland }}</dd>
            </dl>
             <dl>
                <dt>種類</dt>
                <dd>{{ $item->type }}</dd>
            </dl>
            <dl>
                <dt>原産地</dt>
                <dd>{{ $item->area }}</dd>
            </dl>
             <dl>
                <dt>度数</dt>
                <dd>{{ $item->alcohol_content }}</dd>
            </dl>
            <dl>
                <dt>蒸留所</dt>
                <dd>{{ $item->distillery }}</dd>
            </dl>
            <dl>
                <dt>メモ</dt>
                <dd>{!! nl2br(e($item->memo)) !!}</dd>
            </dl>
            
        </div>
        
        <div class="col-6">
            <div class="polaroids">
            <a href="{{ $item->image }}" data-lightbox="group"><img src="{{ $item->image }}"  class="img-fluid"></a>
            </div>
             @if (Auth::id() == $item->user_id)
            <div class="button">
            {{-- 編集ページへのリンク --}}
            {!! link_to_route('items.edit', '編集', ['item' => $item->id], ['class' => 'btn btn-outline-dark']) !!}
            {{-- 削除フォーム --}}
            {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-outline-danger']) !!}
            {!! Form::close() !!}
            </div>
            @endif
            
        </div>
        
    </div>
 </div>   
        
@endsection
