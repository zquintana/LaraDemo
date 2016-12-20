<?php

namespace App\Http\Controllers;

use App\Model\Album;
use App\Model\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class AlbumsController
 */
class AlbumsController extends Controller
{
    /**
     * @return View
     */
    public function index(Request $request)
    {
        $qb = Album::sortable();
        if ($request->request->has('band')) {
            $qb->where('band_id', $request->request->getInt('band'));
        }

        return view('albums.index', [
            'albums' => $qb->paginate(10),
            'bands'  => Band::all(),
        ]);
    }

    /**
     * @param integer $id
     *
     * @return View
     */
    public function edit($id)
    {
        return view('albums.edit', [
            'album' => Album::findOrFail($id),
            'bands' => Band::all(),
        ]);
    }

    /**
     * @param Request $request
     * @param integer $id
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        /** @var Album $album */
        $album = Album::findOrFail($id);
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'band_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $album->update(Input::all());

        return redirect()
            ->route('album.index')
            ->with('success', sprintf('Album updated. <a href="%s">edit</a>', route('album.edit', $album->id)));
    }

    /**
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        /** @var Album $album */
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()
            ->route('album.index')
            ->with('success', sprintf('Deleted album "%s".', $album->name));
    }
}
