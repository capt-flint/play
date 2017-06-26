<div style="padding-top:50px;"> </div>
<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="media">
                <div align="center">
                    <img class="thumbnail img-responsive"
                         src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="300px" height="300px">
                </div>
                <div>Добавить в друзья</div>
                <div class="media-body">
                    <hr>
                    <h3><strong>Bio</strong></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus,
                        non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                    <hr>
                    <h3><strong>Location</strong></h3>
                    <p>Earth</p>
                    <hr>
                    <h3><strong>Gender</strong></h3>
                    <p>Bat</p>
                    <hr>
                    <h3><strong>Age</strong></h3>
                    @if($user->profile)
                        <p>{{$user->profile->age}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>