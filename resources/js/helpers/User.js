import AppStorage from "./AppStorage";
import Token from "./Token";

class User {
    hasToken() {
        const storeToken = AppStorage.getToken();
        if (storeToken) {
            return Token.isValid(storeToken) ? true : this.logout();
        }
        return false;
    }

    loggedIn() {
        return this.hasToken();
    }

    logout() {
        AppStorage.clear();
        window.location.href = "/login";
    }

    name() {
        if (this.loggedIn()) {
            return AppStorage.getUser();
        }
    }

    id() {
        if (this.loggedIn()) {
            return Token.payload(AppStorage.getToken()).sub;
        }
    }

    own(id) {
        return this.id() === parseInt(id);
    }

    admin() {
        return this.id() === 11;
    }
}

export default User = new User();
