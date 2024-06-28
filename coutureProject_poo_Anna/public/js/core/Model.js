export class Model {
    async getData(url) {
        const resp = await fetch(url);
        return resp;
    }
}

export const WEBROOT = "http://localhost:8010"