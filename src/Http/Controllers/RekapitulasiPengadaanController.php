<?php namespace Bantenprov\RekapitulasiPengadaan\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\RekapitulasiPengadaan\Facades\RekapitulasiPengadaan;

/* Models */
use Bantenprov\RekapitulasiPengadaan\Models\Bantenprov\RekapitulasiPengadaan\RekapitulasiPengadaan as RekapitulasiPengadaan;
use Bantenprov\RekapitulasiPengadaan\Models\Bantenprov\RekapitulasiPengadaan\Province;
use Bantenprov\RekapitulasiPengadaan\Models\Bantenprov\RekapitulasiPengadaan\Regency;

/* etc */
use Validator;

/**
 * The RekapitulasiPengadaanController class.
 *
 * @package Bantenprov\RekapitulasiPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekapitulasiPengadaanController extends Controller
{

    protected $province;

    protected $regency;

    protected $lpse_rekapitulasi_pengadaan;

    public function __construct(Regency $regency, Province $province, RekapitulasiPengadaan $lpse_rekapitulasi_pengadaan)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->lpse_rekapitulasi_pengadaan     = $lpse_rekapitulasi_pengadaan;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $lpse_rekapitulasi_pengadaan = $this->rekapitulasi-pengadaan->find($id);

        return response()->json([
            'negara'    => $rekapitulasi-pengadaan->negara,
            'province'  => $rekapitulasi-pengadaan->getProvince->name,
            'regencies' => $rekapitulasi-pengadaan->getRegency->name,
            'tahun'     => $rekapitulasi-pengadaan->tahun,
            'data'      => $rekapitulasi-pengadaan->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->rekapitulasi-pengadaan->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->rekapitulasi-pengadaan->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

