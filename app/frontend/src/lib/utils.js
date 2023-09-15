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
    cookies.set('ConnectedUser', JSON.stringify(user), {
        httpOnly: true,
        secure: true,
        sameSite: 'strict',
        maxAge: 60 * 60,
        path: '/'
    });
};