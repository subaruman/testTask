@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        <div class="col-sm-6">
                <h3 class="list-group-item-heading">Количество пользователей зарегистрированных
                    на сайте: {{$users}}</h3>
        </div>
        <div class="col-sm-6">
                <h3 class="list-group-item-heading">Количество чеклистов созданных
                    на сайте: {{$checklists}}</h3>
        </div>

        <div class="col-sm-6">
            <h3 class="list-group-item-heading">Количество пунктов чеклистов созданных
                на сайте: {{$items}}</h3>
        </div>

    </div>


    <!-- UI # -->
    <div class="ui-35">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Bar Item -->
                    <div class="bar-item">
                        <div class="bar">
                            <!-- Vertical bar -->
                            <div class="vertical-bar">
                                <div class="bar-content bg-red" data-limit="90"></div>
                            </div>
                        </div>
                        <div class="details">
                            <!-- Heading -->
                            <h4>Income <span class="red">90%</span></h4>
                            <!-- Paragraph -->
                            <p>Ness it will frequently occur that pleasures have to be  occur that  and easy to distinguish.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Bar Item -->
                    <div class="bar-item">
                        <div class="bar">
                            <!-- Vertical bar -->
                            <div class="vertical-bar">
                                <div class="bar-content bg-green" data-limit="40"></div>
                            </div>
                        </div>
                        <div class="details">
                            <!-- Heading -->
                            <h4>Orders <span class="green">40%</span></h4>
                            <!-- Paragraph -->
                            <p>Ness it will frequently occur that pleasures have to be  occur that  and easy to distinguish.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Bar Item -->
                    <div class="bar-item">
                        <div class="bar">
                            <!-- Vertical bar -->
                            <div class="vertical-bar">
                                <div class="bar-content bg-lblue" data-limit="60"></div>
                            </div>
                        </div>
                        <div class="details">
                            <!-- Heading -->
                            <h4>Visitors <span class="lblue">60%</span></h4>
                            <!-- Paragraph -->
                            <p>Ness it will frequently occur that pleasures have to be  occur that  and easy to distinguish.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Bar Item -->
                    <div class="bar-item">
                        <div class="bar">
                            <!-- Vertical bar -->
                            <div class="vertical-bar">
                                <div class="bar-content bg-orange" data-limit="49"></div>
                            </div>
                        </div>
                        <div class="details">
                            <!-- Heading -->
                            <h4>Downloads <span class="orange">49%</span></h4>
                            <!-- Paragraph -->
                            <p>Ness it will frequently occur that pleasures have to be  occur that  and easy to distinguish.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Bar Item -->
                    <div class="bar-item">
                        <div class="bar">
                            <!-- Vertical bar -->
                            <div class="vertical-bar">
                                <div class="bar-content bg-yellow" data-limit="80"></div>
                            </div>
                        </div>
                        <div class="details">
                            <!-- Heading -->
                            <h4>Members <span class="yellow">80%</span></h4>
                            <!-- Paragraph -->
                            <p>Ness it will frequently occur that pleasures have to be  occur that  and easy to distinguish.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Bar Item -->
                    <div class="bar-item">
                        <div class="bar">
                            <!-- Vertical bar -->
                            <div class="vertical-bar">
                                <div class="bar-content bg-purple" data-limit="67"></div>
                            </div>
                        </div>
                        <div class="details">
                            <!-- Heading -->
                            <h4>Clients <span class="purple">67%</span></h4>
                            <!-- Paragraph -->
                            <p>Ness it will frequently occur that pleasures have to be  occur that  and easy to distinguish.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Bar Item -->
                    <div class="bar-item">
                        <div class="bar">
                            <!-- Vertical bar -->
                            <div class="vertical-bar">
                                <div class="bar-content bg-blue" data-limit="49"></div>
                            </div>
                        </div>
                        <div class="details">
                            <!-- Heading -->
                            <h4>Branches <span class="blue">49%</span></h4>
                            <!-- Paragraph -->
                            <p>Ness it will frequently occur that pleasures have to be  occur that  and easy to distinguish.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Bar Item -->
                    <div class="bar-item">
                        <div class="bar">
                            <!-- Vertical bar -->
                            <div class="vertical-bar">
                                <div class="bar-content bg-rose" data-limit="74"></div>
                            </div>
                        </div>
                        <div class="details">
                            <!-- Heading -->
                            <h4>Viewers <span class="rose">74%</span></h4>
                            <!-- Paragraph -->
                            <p>Ness it will frequently occur that pleasures have to be  occur that  and easy to distinguish.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>



    <script>
        $(function() {

            setTimeout(function(){

                $('.bar-content').each(function() {
                    var me = $(this);
                    var perc = me.attr("data-limit");
                    var current_perc = 0;

                    if(!$(this).hasClass('stop')){

                        var progress = setInterval(function() {

                            if (current_perc>=perc) {
                                clearInterval(progress);
                            } else {
                                current_perc +=1;
                                me.css('height', (current_perc)+'%');
                            }

                        }, 15);

                        me.addClass('stop');

                    }

                });

            }, 0);

        });

    </script>

@endsection
