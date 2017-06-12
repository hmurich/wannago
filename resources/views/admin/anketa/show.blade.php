@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-6'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                @if ($item->name)
                    <div class="form-group">
                        <label  >Названия заведения:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->name }}' >
                    </div>
                @endif
                @if ($item->address)
                    <div class="form-group">
                        <label  >Адрес:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->address }}' >
                    </div>
                @endif
                @if ($item->fio)
                    <div class="form-group">
                        <label  >ФИО:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->fio }}' >
                    </div>
                @endif
                @if ($item->phone)
                    <div class="form-group">
                        <label  >Телефон:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->phone }}' >
                    </div>
                @endif
                @if ($item->email)
                    <div class="form-group">
                        <label  >email:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->email }}' >
                    </div>
                @endif

                @if ($item->cat_id)
                    <div class="form-group">
                        <label  >Категория:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->cat_id }}' >
                    </div>
                @endif
                @if ($item->number)
                    <div class="form-group">
                        <label  >Номер:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->number }}' >
                    </div>
                @endif
                @if ($item->avg_price)
                    <div class="form-group">
                        <label  >Средний счет:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->avg_price }}' >
                    </div>
                @endif
                @if ($item->kitchen_id)
                    <div class="form-group">
                        <label  >Кухня:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->kitchen_id }}' >
                    </div>
                @endif
                @if ($item->work_time_from)
                    <div class="form-group">
                        <label  >Время работы:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->work_time_from }} - {{ $item->work_time_to }}' >
                    </div>
                @endif

                @if ($item->note_zal)
                    <div class="form-group">
                        <label  >Описание залов:</label>
                        <p>{!! $item->note_zal !!}</p>
                    </div>
                @endif
                @if ($item->kredit_cart)
                    <div class="form-group">
                        <label  >Кредитные карты:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->kredit_cart }}' >
                    </div>
                @endif
                @if ($item->park)
                    <div class="form-group">
                        <label  >Парковка:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->park }}' >
                    </div>
                @endif
                @if ($item->children)
                    <div class="form-group">
                        <label  >Детям:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->children }}' >
                    </div>
                @endif
                @if ($item->musik)
                    <div class="form-group">
                        <label  >Музыка:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->musik }}' >
                    </div>
                @endif
                @if ($item->ar_special)
                    <div class="form-group">
                        <label  >Особенности:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->ar_special }}' >
                    </div>
                @endif

                @if ($item->description)
                    <div class="form-group">
                        <label  >Описание:</label>
                        <p>{!! $item->description !!}</p>
                    </div>
                @endif
                @if ($item->photo_service_time_from)
                    <div class="form-group">
                        <label  >Время фотосессии:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->photo_service_time_from }} - {{ $item->photo_service_time_to }}' >
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class='col-md-6'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Акция и фото</h3>
            </div>
            <div class="box-body">
                @if ($item->sale_title)
                    <div class="form-group">
                        <label  >Заголовок:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->sale_title }}' >
                    </div>
                @endif
                @if ($item->sale_date)
                    <div class="form-group">
                        <label  >Дата:</label>
                        <input type="text" class="form-control" readonly value='{{ $item->sale_date }}' >
                    </div>
                @endif
                @if ($item->sale_note)
                    <div class="form-group">
                        <label  >Описание:</label>
                        <p>{!! $item->sale_note !!}</p>
                    </div>
                @endif
                @foreach ($photos as $p)
                    <div class="form-group">
                        <label  >Фото:</label> <br />
                        <img style="width:70%" src="{{ $p->photo }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
