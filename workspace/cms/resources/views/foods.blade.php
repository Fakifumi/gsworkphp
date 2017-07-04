@extends('layouts.app')
@section('content')
<!-- Bootstrap の定形コード... -->
    <div class="panel-body">
<!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
<!-- バリデーションエラーの表示に使用-->
<!-- 食材登録フォーム -->
        <form action="{{ url('foods') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
<!-- 食材のタイトル -->
            <div class="form-group">
                <label for="food" class="col-sm-3 control-label">Food</label>
                
            <div class="col-sm-6">
                    <input type="text" name="item_name" id="food-name"　class="form-control">
                </div>
</div>
<!-- 食材 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> 保存
                    </button>
                </div>
            </div>
        </form>
</div>
<!-- Book: 既に登録されてる食材のリスト
<!-- 現在の食材 -->
@if (count($foods) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">現在の食材 </div
<div class="panel-body">
                <table class="table table-striped task-table">
<!-- テーブルヘッダ -->
    <thead> 
        <th>食材一覧</th>
        <th>&nbsp;</th>
    </thead>
<!-- テーブル本体 -->
    <tbody>
        @foreach ($foods as $food)
    <tr>
<!-- 本タイトル -->
        <td class="table-text">
            <div>{{ $food->item_name }}</div>
        </td>
<!-- 本: 削除ボタン -->
        <td>
            
            <form action="{{ url('food/'.$food->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> 消費
    </button>
</form>
            
        </td>    
    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
<!-- Book: 既に登録されてる本のリスト -->



@endsection