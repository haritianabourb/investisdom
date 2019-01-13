@push('css')
<style>
    @page {
        footer: page-footer;
    }
    @page {
        margin-bottom: 80px;
    }
</style>
@endpush
<htmlpagefooter name="page-footer">
    <div>
        <hr style="border-top: 1px solid rgb(0,0,0);">
        <table width="100%">
            <tr>
                <td width="33%">{DATE j-m-Y}</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right;">Paraphez ici</td>
            </tr>
        </table>
        <br>
        <div style="font-size: 4px; color :lightgrey; text-align: center;">
            INVESTIS DEFISCALISATION OUTRE MER, SAS au capital de 10 000 euros, immatriculée au RCS de Saint Denis
            sous le numméro 820 090 652 / 62 Boulevard du chaudron - 97490 - SAINTE CLOTILDE
        </div>
    </div>
</htmlpagefooter>