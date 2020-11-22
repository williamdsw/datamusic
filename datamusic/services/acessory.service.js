
class AcessoryService {
    static async getLastAcessories() {
        const url = `../private/accessory-select.php?column=content&last=true`
        return await fetch(url);
    }
}