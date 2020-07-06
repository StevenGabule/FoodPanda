import Cookie from 'js-cookie';

export const saveUserData = ({token, expiresIn}, {name, email, avatar}) => {
    const tokenExpiration = Date.now() + expiresIn * 1000;
    localStorage.setItem("jwt", token);
    localStorage.setItem("expiresIn", tokenExpiration);
    localStorage.setItem("name", name);
    localStorage.setItem("email", email);
    localStorage.setItem("avatar", avatar);
    Cookie.set("jwt", token);
    Cookie.set("expiresIn", tokenExpiration);
    Cookie.set("name", name);
    Cookie.set("email", email);
    Cookie.set("avatar", avatar);
};

export const getUserFromCookie = req => {
    if (!req.headers.cookie) return;

    const jwtCookie = req.headers.cookie.split(";").find(c => c.trim().startsWith("jwt="));
    const expiresInCookie = req.headers.cookie.split(";").find(c => c.trim().startsWith("expiresIn="));
    const nameCookie = req.headers.cookie.split(";").find(c => c.trim().startsWith("name="));
    const emailCookie = req.headers.cookie.split(";").find(c => c.trim().startsWith("email="));
    const avatarCookie = req.headers.cookie.split(";").find(c => c.trim().startsWith("avatar="));

    if (!jwtCookie || !expiresInCookie || !nameCookie || !emailCookie || !avatarCookie) return;

    const jwt = jwtCookie.split("=")[1];
    const expiresIn = expiresInCookie.split("=")[1];
    const name = nameCookie.split("=")[1];
    const email = emailCookie.split("=")[1];
    const avatar = avatarCookie.split("=")[1];

    return {jwt, expiresIn, name, email, avatar};
};


export const getUserFromLocalStorage = () => {
    if (localStorage) {
        const jwt = localStorage.getItem("jwt");
        const expiresIn = localStorage.getItem("expiresIn");
        const name = localStorage.getItem("name");
        const email = localStorage.getItem("email");
        const avatar = localStorage.getItem("avatar");
        return { jwt, expiresIn, name, email, avatar };
    }
};


export const clearUserData = () => {
    if (!process.server) {
        localStorage.removeItem("jwt");
        localStorage.removeItem("expiresIn");
        localStorage.removeItem("name");
        localStorage.removeItem("email");
        localStorage.removeItem("avatar");
    }
    Cookie.remove("jwt");
    Cookie.remove("expiresIn");
    Cookie.remove("name");
    Cookie.remove("email");
    Cookie.remove("avatar");
};

