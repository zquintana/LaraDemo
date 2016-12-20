<?php

namespace App\Http\Controllers;

use App\Model\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class BandsController
 */
class BandsController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('bands.index', [
            'bands' => Band::sortable()->paginate(10),
        ]);
    }

    /**
     * @param integer $id
     *
     * @return View
     */
    public function edit($id)
    {
        return view('bands.edit', [
            'band' => Band::findOrFail($id),
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
        /** @var Band $band */
        $band = Band::findOrFail($id);
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $band->update(Input::all());

        return redirect()
            ->route('band.index')
            ->with('success', sprintf('Band updated. <a href="%s">edit</a>', route('band.edit', $band->id)));
    }

    /**
     * @param integer $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        /** @var Band $band */
        $band = Band::findOrFail($id);
        $band->delete();

        return redirect()
            ->route('band.index')
            ->with('success', sprintf('Deleted "%s".', $band->name));
    }
}
