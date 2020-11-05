<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jelo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class JelaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$jela = Jelo::orderBy('created_at', 'desc')->get();
        //po nazivu
        //$jelo=Jelo::where('naziv', 'Pomfri')->get();
        $jela = Jelo::orderBy('created_at', 'desc')->paginate(10);
        return view('jela.index')->with('jela', $jela);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jela.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv'=>'required',
            'opis'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
		
	        $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($request->file('cover_image')->getRealPath());
            $thumb->resize(80, 80);
            $thumb->save('storage/cover_images/'.$thumbStore);
		
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $jelo=new Jelo;
        $jelo->naziv = $request->input('naziv');
        $jelo->opis = $request->input('opis');
        $jelo->user_id = auth()->user()->id;
        $jelo->cover_image=$fileNameToStore;
        $jelo->save();

        return redirect('/jela')->with('success', 'Uspješno objavljeno');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jelo = Jelo::find($id);
        return view('jela.show')->with('jelo', $jelo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jelo = Jelo::find($id);
        //check for correct user
        if(auth()->user()->id !== $jelo->user_id){
            return redirect('/jela')->with('error', 'Neovlaštena stranica');
        }
        return view('jela.edit')->with('jelo', $jelo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv'=>'required',
            'opis'=>'required'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
		
	        $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($request->file('cover_image')->getRealPath());
            $thumb->resize(80, 80);
            $thumb->save('storage/cover_images/'.$thumbStore);
		
        }

        $jelo= Jelo::find($id);
        $jelo->naziv = $request->input('naziv');
        $jelo->opis = $request->input('opis');
        if($request->hasFile('cover_image')){
            $jelo->cover_image = $fileNameToStore;
        }
        $jelo->save();

        /* try {
            //$jelo->opis = null;
            $jelo->save();
            return redirect('/jela')->with('success', 'Uspješno spremljeno');
        } catch (Exception $e) {
            return redirect('/jela')->with('error', 'Desila se pogreška.' . $e->getMessage());
        } */

        return redirect('/jela')->with('success', 'Uspješno uređeno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jelo=Jelo::find($id);

        if(auth()->user()->id !== $jelo->user_id){
            return redirect('/jela')->with('error', 'Neovlaštena stranica');
        }

        if($jelo->cover_image !== 'noimage.jpg'){
            Storage::delete('/public/cover_images/'.$jelo->cover_image);
        }

        $jelo->delete();
        return redirect('/jela')->with('success', 'Uspješno obrisano');
    }
}
