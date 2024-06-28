import { Model, WEBROOT } from "../core/Model.js";


export class FournisseurModel extends Model  {
    async findFournisseurByTel(tel) {
        let resp = await this.getData(`${WEBROOT}/?controller=fournisseur&action=get-tel&tel=${tel}`)
        console.log(resp);
        return resp;
    }
}