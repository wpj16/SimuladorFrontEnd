class SessionStorage {
    /* add valores em session storage */
    add(id, objJson) {
        try {
            var item = JSON.stringify(objJson);
            sessionStorage.setItem(id, item);
            return JSON.parse(item);
        } catch (e) {
            console.log(e);
            alert('Erro ao adicionar dados em session storage!');
        }
        return false;
    }
    /* lista valor em session storage */
    select(id) {
        try {
            if (sessionStorage.length <= 0) {
                return false;
            }
            var item = sessionStorage.getItem(id);
            if (item == null || item === '' || typeof item === 'undefined') {
                item = '{}';
            }
            return JSON.parse(item);
        } catch (e) {
            console.log(e);
            alert('Erro ao selecionar dados em session storage!');
        }
        return false;
    }
    /* lista todos os valores em session storage */
    selectAll() {
        try {
            var item = {};
            if (sessionStorage.length <= 0) {
                return item;
            }
            for (var i = 0; i < sessionStorage.length; i++) {
                var key = sessionStorage.key(i);
                var itemList = sessionStorage.getItem(key);
                if (typeof itemList === 'object') {
                    itemList = JSON.parse(itemList);
                }
                item[key] = itemList;
            }
            return item;
        } catch (e) {
            console.log(e);
            alert('Erro ao selecionar dados em session storage!');
        }
        return false;
    }
    /* deleta valor em session storage */
    delete(id) {
        try {
            sessionStorage.removeItem(id);
            return true;
        } catch (e) {
            console.log(e);
            alert('Erro ao deletar dados em session storage!');
        }
        return false;
    }
}

export default SessionStorage;

