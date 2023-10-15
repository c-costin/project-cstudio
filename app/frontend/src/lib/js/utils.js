// @ts-nocheck
export const setAuthToken = ({cookies, token}) => {
    cookies.set('AuthorizationToken', `Bearer ${token}`, {
        httpOnly: true,
        secure: true,
        sameSite: 'strict',
        maxAge: 60 * 60,
        path: '/'
    });
};

export const setUser = ({cookies, user}) => {
    const connectedUser = JSON.stringify(user)
    cookies.set('ConnectedUser', connectedUser, {
        httpOnly: true,
        secure: true,
        sameSite: 'strict',
        maxAge: 60 * 60,
        path: '/'
    });
};

export const UptoCaptilizer = (keyword) => {
    return keyword.charAt(0).toUpperCase() + keyword.slice(1)
}