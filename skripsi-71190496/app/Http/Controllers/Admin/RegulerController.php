<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Tema;
use App\Models\Produk;
use App\Models\Reguler;
use App\Models\pelatihan_fasilitator;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Models\fasilitator_pelatihan_test;
use Brackets\AdminListing\Facades\AdminListing;
use App\Http\Requests\Admin\Reguler\IndexReguler;
use App\Http\Requests\Admin\Reguler\StoreReguler;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Requests\Admin\Reguler\UpdateReguler;
use Illuminate\Auth\Access\AuthorizationException;
use App\Http\Requests\Admin\Reguler\DestroyReguler;
use App\Http\Requests\Admin\Reguler\BulkDestroyReguler;


class RegulerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReguler $request
     * @return array|Factory|View
     */
    public function index(IndexReguler $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Reguler::class)->processRequestAndGet(
            // pass the request with params
            $request,
            // 'id_pelatihan', 'id_fasilitator', 'id_tema'
            // set columns to query
            ['id', 'nama_pelatihan', 'tanggal_mulai', 'tanggal_selesai', 'tanggal_pendaftaran', 'tanggal_batas_pendaftaran', 'status'],

            // set columns to searchIn
            ['id','nama_pelatihan', 'deskripsi_pelatihan']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.reguler.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        // $this->authorize('admin.reguler.create');

        return view('admin.reguler.create', [
            'jenis_produk' => Produk::all(),
            'tema' => Tema::all(),
            'id_fasilitator' => fasilitator_pelatihan_test::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReguler $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReguler $request)
    {
        // dd($request->all());
        // Sanitize input
        $sanitized = $request->validated();
        // Mendapatkan ID fasilitator yang dipilih dari request
        $id_fasilitator = $request->getFasilitator();

        $sanitized['id_fasilitator'] = implode(',', $id_fasilitator);
        $reguler = Reguler::create($sanitized);

        $reguler->fasilitator()->attach($request->getFasilitator());

        // DB::transaction(function () use ($sanitized) {
        //     // Simpan instansi Reguler
        //     $reguler = Reguler::create($sanitized);
        //     $reguler->fasilitator()->sync($sanitized['fasilitator']);
        // });

        if ($request->ajax()) {
            return ['redirect' => url('admin/regulers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/regulers');
    }

    /**
     * Display the specified resource.
     *
     * @param Reguler $reguler
     * @throws AuthorizationException
     * @return void
     */
    public function show(Reguler $reguler)
    {
        // $this->authorize('admin.reguler.show', $reguler);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reguler $reguler
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Reguler $reguler)
    {
        // $this->authorize('admin.reguler.edit', $reguler);

        $reguler->load('fasilitator');
        $reguler->loadMedia('gambar');


        return view('admin.reguler.edit', [
            'reguler' => $reguler,
            'jenis_produk' => Produk::all(),
            'tema' => Tema::all(),
            'id_fasilitator' => fasilitator_pelatihan_test::all(), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReguler $request
     * @param Reguler $reguler
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReguler $request, Reguler $reguler)
    {
        // Sanitize input
        $sanitized = $request->validated();
        // Mendapatkan ID fasilitator yang dipilih dari request
        $id_fasilitator = $request->getFasilitator();

        $sanitized['id_fasilitator'] = implode(',', $id_fasilitator);
        $reguler->update($sanitized);

        $reguler->fasilitator()->attach($request->getFasilitator());

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/regulers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/regulers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReguler $request
     * @param Reguler $reguler
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReguler $request, Reguler $reguler)
    {
        $reguler->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReguler $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReguler $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Reguler::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
