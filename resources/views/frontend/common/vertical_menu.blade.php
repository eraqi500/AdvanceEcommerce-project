@php
    $categories = App\Models\Category::orderBy('category_name_en',  'ASC')->get();
    @endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach($categories as $category)

                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
                        @if(session()->get('language') == 'arabic')
                            {{$category->category_name_ar}}
                        @else
                            {{$category->category_name_en}}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">

                                @php
                                    $subcateogries = App\Models\SubCategory::where('category_id',$category->id)
                                                -> orderBy('subcategory_name_en','ASC')->get();
                                @endphp

                                @foreach($subcateogries as $sub)
                                    <div class="col-sm-12 col-md-3">
                                        <a href="{{url('subcategory/product/'.$sub->id.'/'.$sub->subcategory_slug_en)}}">
                                        <h2>
                                            @if(session()->get('language') == 'arabic')
                                                {{$sub->subcategory_name_ar}}
                                            @else
                                                {{$sub->subcategory_name_en}}
                                            @endif
                                        </h2>
                                        </a>

                                        @php
                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)
                                            ->orderby('subsubcategory_name_en' , 'ASC')->get();
                                        @endphp

                                        @foreach($subsubcategories as $subsub)
                                            <ul class="links list-unstyled">
                                                <li><a href="{{url('subsubcategory/product/'.$subsub->id.'/'.$subsub->subsubcategory_slug_en)}}">
                                                        @if(session()->get('language') == 'arabic')
                                                            {{$subsub->subsubcategory_name_ar}}
                                                        @else
                                                            {{$subsub->subsubcategory_name_en}}
                                                        @endif
                                                    </a></li>
                                            </ul>
                                        @endforeach
                                    </div>
                            @endforeach
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
        @endforeach <!--End Category -->
            <!-- /.menu-item -->

            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                <!-- /.dropdown-menu -->
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
