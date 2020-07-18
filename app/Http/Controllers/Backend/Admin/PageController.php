<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\AboutUsRequest;
use App\Http\Requests\Backend\TermsAndConditionRequest;
use App\Http\Requests\Backend\ContactUsRequest;
use App\Models\Page;
use App\Models\ContactUs;
use Illuminate\Support\Str;
use Toastr;
use Config;


class PageController extends Controller
{
    public function about(Request $request)
    {
        $page_title         = 'About US';
        $page_description   = '';
        $page_breadcrumbs  = '';
        $data = Page::where('slug', 'about-us')->first();

        return view('backend.admin.pages.about_us', compact('page_title', 'page_description', 'page_breadcrumbs','data'));

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $banner
     * @return \Illuminate\Http\Response
     */
    public function aboutUpdate(AboutUsRequest $request)
    {
        $slug = Str::slug($request->name, "-");

        if($request->hidden_id != '') {
            $page           = Page::findOrFail($request->hidden_id);
        } else {
            $page           = new Page;
        }
        $page->name         = $request->name;
        $page->slug         = $slug;
        $page->heading      = $request->heading;
        $page->description  = $request->description;
        $page->id           = $request->hidden_id;
        
       if($page->save()) {
        $data = Page::where('slug', 'about-us')->first();
            if($request->hidden_id != '') {
                Toastr::success('AboutUS updated successfully!','', Config::get('constants.toster'));
                return redirect('/admin/about-us')->with( ['data' => $data] );
            } else {
                Toastr::success('AboutUS added successfully!','', Config::get('constants.toster'));
                return redirect('/admin/about-us')->with( ['data' => $data] );
            }
       } else {
        Toastr::success('AboutUS dose not added!','', Config::get('constants.toster'));
        return redirect('/admin/about-us');
       }

    }

    public function termsAndConditon(Request $request)
    {
        $page_title         = 'Terms And Conditions';
        $page_description   = '';
        $page_breadcrumbs  = '';
        $data = Page::where('slug', 'terms-and-conditions')->first();

        return view('backend.admin.pages.terms_and_conditions', compact('page_title', 'page_description', 'page_breadcrumbs','data'));

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $banner
     * @return \Illuminate\Http\Response
     */
    public function termsUpdate(TermsAndConditionRequest $request)
    {
        $slug = Str::slug($request->name, "-");

        if($request->hidden_id != '') {
            $page           = Page::findOrFail($request->hidden_id);
        } else {
            $page           = new Page;
        }
        $page->name         = $request->name;
        $page->slug         = $slug;
        $page->heading      = $request->heading;
        $page->description  = $request->description;
        $page->id           = $request->hidden_id;
        
       if($page->save()) {
        $data = Page::where('slug', 'terms-and-conditions')->first();
            if($request->hidden_id != '') {
                Toastr::success('Terms and conditions updated successfully!','', Config::get('constants.toster'));
                return redirect('/admin/terms-and-conditions')->with( ['data' => $data] );
            } else {
                Toastr::success('Terms and conditions added successfully!','', Config::get('constants.toster'));
                return redirect('/admin/terms-and-conditions')->with( ['data' => $data] );
            }
       } else {
        Toastr::success('Terms and conditions dose not added!','', Config::get('constants.toster'));
        return redirect('/admin/terms-and-conditions');
       }

    }


    public function ContactUs(Request $request)
    {
        $page_title         = 'Contact US';
        $page_description   = '';
        $page_breadcrumbs  = '';
        $data = ContactUs::first();

        return view('backend.admin.pages.contact_us', compact('page_title', 'page_description', 'page_breadcrumbs','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactus
     * @return \Illuminate\Http\Response
     */
    public function ContactUsUpdate(ContactUsRequest $request)
    {

        if($request->hidden_id != '') {
            $contactUs        = ContactUs::findOrFail($request->hidden_id);
        } else {
            $contactUs        = new ContactUs;
        }
        $contactUs->address    = $request->address;
        $contactUs->address1   = $request->address1;
        $contactUs->email      = $request->email;
        $contactUs->cell_phone = $request->cell_phone;
        $contactUs->telephone  = $request->telephone;
        $contactUs->international_call  = $request->international_call;
        $contactUs->id         = $request->hidden_id;
        
       if($contactUs->save()) {
        $data = ContactUs::first();
            if($request->hidden_id != '') {
                Toastr::success('Contact us updated successfully!','', Config::get('constants.toster'));
                return redirect('/admin/contact-us')->with( ['data' => $data] );
            } else {
                Toastr::success('Contact us added successfully!','', Config::get('constants.toster'));
                return redirect('/admin/contact-us')->with( ['data' => $data] );
            }
       } else {
        Toastr::success('Contact us dose not added!','', Config::get('constants.toster'));
        return redirect('/admin/contact-us');
       }

    }



}