@extends('company.layout')

@section('title', $title)

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body table-responsive no-padding">
      		<div class="pad">
      			<span class="pad__heading">Приветствуем Вас ! Рады видеть Вас в числе клиентов weekends.kz</span> 
      			<p>Мы сконструктурировали Ваш ЛИЧНЫЙ КАБИНЕТ так, чтобы Вы могли воспользоваться и получить максимальную выгоду от использования сервиса weekends.kz. </p>
						<ul class="pad-ul">
							<li>В личном кабинете Вы можете:</li> 
							<li>- Редактировать данные о Вашем заведений </li>
							<li>- Редактировать, добавлять информаций об акция, новостях, событиях, о новом меню и много другое </li>
							<li>- Редактировать, добавлять фото Вашего интерьера и экстерьера, блюд, прошедших событий, персонала и т.д.</li>
						</ul>
				</div>
				<style>
					.pad{
						padding:25px;
					}
					.pad__heading{
						font-size:24px;
						display:block;
						font-weight:bold;
						margin-bottom:10px;
					}
					.pad-ul{
						list-style:none;
					}
					.pad-ul li{
						margin-bottom:4px;
					}
				</style>	
      </div>
    </div>
  </div>
</div>

@endsection
