<div>
    <div class="tab">
        <ul class="nav nav-tabs customtab" role="tablist">
            <li class="nav-item">
                <a wire:click.prevent='selectTab("general_settings")' class="nav-link
                   {{$tab == 'general_settings' ? 'active' : '' }}"
                   data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">General settings</a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a wire:click.prevent='selectTab("logo_favicon")' class="nav-link--}}
{{--                   {{$tab == 'logo_favicon' ? 'active' : '' }}"--}}
{{--                   data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo & Favicon</a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a wire:click.prevent='selectTab("social_networks")' class="nav-link
                   {{$tab == 'social_networks' ? 'active' : '' }}"
                   data-toggle="tab" href="#social_networks" role="tab" aria-selected="false">Social networks</a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a wire:click.prevent='selectTab("payment_methods")' class="nav-link--}}
{{--                   {{$tab == 'payment_methods' ? 'active' : '' }}"--}}
{{--                   data-toggle="tab" href="#payment_methods" role="tab" aria-selected="true">Payment methods</a>--}}
{{--            </li>--}}
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade {{ $tab == 'general_settings' ? 'active show' : '' }}" id="general_settings" role="tabpanel">
                <div class="pd-20">
                    <form wire:submit.prevent="updateGeneralSettings()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter the name" wire:model.defer="site_name">
                                    @error('site_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site email</b></label>
                                    <input type="text" class="form-control" placeholder="Enter the email" wire:model.defer="site_email">
                                    @error('site_email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site phone</b></label>
                                    <input type="text" class="form-control" placeholder="Enter the phone" wire:model.defer="site_phone">
                                    @error('site_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for=""><b>Site meta keywords</b><small>Separated by coma (a,b,c)</small></label>--}}
{{--                                    <input type="text" class="form-control" placeholder="Enter the meta keywords" wire:model.defer="site_meta_keywords">--}}
{{--                                    @error('site_meta_keywords')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="form-group">
                            <label for=""><b>Site Address</b></label>
                            <input type="text" class="form-control" placeholder="Enter site address" wire:model.defer="site_address">
                            @error('site_address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="">Site meta description</label>--}}
{{--                            <textarea cols="4" rows="4" placeholder="Site meta description..." class="form-control"--}}
{{--                                      wire:model.defer="site_meta_description"></textarea>--}}
{{--                            @error('site_meta_description')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
{{--            <div class="tab-pane fade {{ $tab == 'logo_favicon' ? 'active show' : '' }}" id="logo_favicon" role="tabpanel">--}}
{{--                <div class="pd-20">--}}
{{--                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                    elit, sed do eiusmod tempor incididunt ut labore et--}}
{{--                    dolore magna aliqua. Ut enim ad minim veniam, quis--}}
{{--                    nostrud exercitation ullamco laboris nisi ut aliquip ex--}}
{{--                    ea commodo consequat. Duis aute irure dolor in--}}
{{--                    reprehenderit in voluptate velit esse cillum dolore eu--}}
{{--                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat--}}
{{--                    non proident, sunt in culpa qui officia deserunt mollit--}}
{{--                    anim id est laborum.--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="tab-pane fade {{ $tab == 'social_networks' ? 'active show' : '' }}" id="social_networks" role="tabpanel">
                <div class="pd-20">
                    <form wire:submit.prevent="updateSocialNetworks()">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Facebook URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="facebook_url" placeholder="Enter Facebook URL">
                                    @error('facebook_url'){{$message}}@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Twitter URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="twitter_url" placeholder="Enter Twitter URL">
                                    @error('twitter_url'){{$message}}@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Instagram URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="instagram_url" placeholder="Enter Instagram URL">
                                    @error('instagram_url'){{$message}}@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Tiki URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="tiki_url" placeholder="Enter Tiki URL">
                                    @error('tiki_url'){{$message}}@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Lazada URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="lazada_url" placeholder="Enter Lazada URL">
                                    @error('lazada_url'){{$message}}@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Shopee URL</b></label>
                                    <input type="text" class="form-control" wire:model.defer="shopee_url" placeholder="Enter Shopee URL">
                                    @error('shopee_url'){{$message}}@enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
{{--            <div class="tab-pane fade {{ $tab == 'payment_methods' ? 'active show' : '' }}" id="payment_methods" role="tabpanel">--}}
{{--                <div class="pd-20">--}}
{{--                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                    elit, sed do eiusmod tempor incididunt ut labore et--}}
{{--                    dolore magna aliqua. Ut enim ad minim veniam, quis--}}
{{--                    nostrud exercitation ullamco laboris nisi ut aliquip ex--}}
{{--                    ea commodo consequat. Duis aute irure dolor in--}}
{{--                    reprehenderit in voluptate velit esse cillum dolore eu--}}
{{--                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat--}}
{{--                    non proident, sunt in culpa qui officia deserunt mollit--}}
{{--                    anim id est laborum.--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
