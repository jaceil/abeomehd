<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlateRequest;
use App\Mouse;
use App\Photo;
use App\Plate;
use App\Project;
use App\Hit;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PlatesController extends Controller
{
    protected $wells = ['A01' => 'A01', 'A02' => 'A02', 'A03'=>'A03', 'A04'=>'A04', 'A05'=>'A05', 'A06'=>'A06', 'A07'=>'A07', 'A08'=>'A08', 'A09'=>'A09', 'A10'=>'A10', 'A11'=>'A11', 'A12'=>'A12',
                        'B01' => 'B01', 'B02' => 'B02', 'B03'=>'B03', 'B04'=>'B04', 'B05'=>'B05', 'B06'=>'B06', 'B07'=>'B07', 'B08'=>'B08', 'B09'=>'B09', 'B10'=>'B10', 'B11'=>'B11', 'B12'=>'B12',
                        'C01' => 'C01', 'C02' => 'C02', 'C03'=>'C03', 'C04'=>'C04', 'C05'=>'C05', 'C06'=>'C06', 'C07'=>'C07', 'C08'=>'C08', 'C09'=>'C09', 'C10'=>'C10', 'C11'=>'C11', 'C12'=>'C12',
                        'D01' => 'D01', 'D02' => 'D02', 'D03'=>'D03', 'D04'=>'D04', 'D05'=>'D05', 'D06'=>'D06', 'D07'=>'D07', 'D08'=>'D08', 'D09'=>'D09', 'D10'=>'D10', 'D11'=>'D11', 'D12'=>'D12',
                        'E01' => 'E01', 'E02' => 'E02', 'E03'=>'E03', 'E04'=>'E04', 'E05'=>'E05', 'E06'=>'E06', 'E07'=>'E07', 'E08'=>'E08', 'E09'=>'E09', 'E10'=>'E10', 'E11'=>'E11', 'E12'=>'E12',
                        'F01' => 'F01', 'F02' => 'F02', 'F03'=>'F03', 'F04'=>'F04', 'F05'=>'F05', 'F06'=>'F06', 'F07'=>'F07', 'F08'=>'F08', 'F09'=>'F09', 'F10'=>'F10', 'F11'=>'F11', 'F12'=>'F12',
                        'G01' => 'G01', 'G02' => 'G02', 'G03'=>'G03', 'G04'=>'G04', 'G05'=>'G05', 'G06'=>'G06', 'G07'=>'G07', 'G08'=>'G08', 'G09'=>'G09', 'G10'=>'G10', 'G11'=>'G11', 'G12'=>'G12',
                        'H01' => 'H01', 'H02' => 'H02', 'H03'=>'H03', 'H04'=>'H04', 'H05'=>'H05', 'H06'=>'H06', 'H07'=>'H07', 'H08'=>'H08', 'H09'=>'H09', 'H10'=>'H10', 'H11'=>'H11', 'H12'=>'H12',];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::all();

        return view('plates.all', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $mouse = Mouse::findOrFail($id);

        return view('plates.create', compact('mouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlateRequest $request)
    {
        $plate = Plate::create($request->all());

        $mouse = Mouse::findOrFail($plate->mouse_id);

        return view('plates.create', compact('mouse'));
    }

    public function manyPlates()
    {
        return view('plates.createMany');
    }

    /**
     * Create many plates simultaneously.
     * @param CreatePlateRequest $request
     * @param $number
     * @return \Illuminate\View\View
     */
    public function storeMany(CreatePlateRequest $request, $number)
    {
        for($i = $request->get('name'); $i < ($i + $number); $i++)
        {
            $data = [
                'name' => $i,
                'mouse_id' => $request->get('mouse_id'),
                'plate_type' => $request->get('plate_type'),
                'description' => $request->get('description'),
                'isProcessed' => $request->get('isProcessed')
            ];

            $plate = Plate::create($data);
            $mouse = Mouse::findOrFail($plate->mouse_id);

            return view('plates.create', compact('mouse'));
        }
    }

    /**
     * Store a newly created hit selected from a plate.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storehits(Request $request)
    {

        $wells = $request->get('wells', []);

        foreach($wells as $well){
            $data = [
                'project_id' => $request->get('project_id'),
                'mouse_id' => $request->get('mouse_id'),
                'plate_id' => $request->get('plate_id'),
                'well' => $well,
                'status' => '0'
            ];
            Hit::create($data);
        }
        $plate = Plate::findOrFail($request->get('plate_id'));

        $project = Project::findOrFail($plate->mouse->project->id);

        return redirect('projects/' . $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wells = $this->wells;
        $plate = Plate::findOrFail($id);

        return view('plates.show', compact('plate', 'wells'));
    }

    /**
     *  Add a photo to a plate based on id.
     * @param $id
     * @param Request $request
     * @return string
     */
    public function addPhoto($id, Request $request)
    {
        $photo = $this->makePhoto($request->file('photo'));

        $plate = Plate::findOrFail($id);
        $plate->addPhoto($photo);
        $plate->update(['isProcessed' => '1']);
    }

    /**
     * Store in the file.
     * @param UploadedFile $file
     * @return mixed
     */
    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())->move($file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plate = Plate::findOrFail($id);

        return view('plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePlateRequest $request, $id)
    {
        $input = Input::except('_method', '_token');
        $wells = $this->wells;
        $plate = Plate::findOrFail($id);
        $plate->update($input);

        return view('plates.show', compact('plate', 'wells'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photos = Plate::findOrFail($id)->photos();
        foreach($photos as $photo) {
            \File::delete([
                $photo->path,
                $photo->thumbnail_path
            ]);
        }

    }

}
