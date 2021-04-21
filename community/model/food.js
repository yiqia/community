import {Http} from "../utils/http";
import {config} from "../config/config";
export async function getEverydayFoodList(){
	return await Http.mocksend({
		url:"getEverydayFoodList"
	})
}