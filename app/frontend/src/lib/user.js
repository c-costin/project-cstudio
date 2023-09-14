// export async function createUser(email, password) {
//   try {
//     const user = await db.user.create({
//       data: {
//         email,
//         password: await bcrypt.hash(password, 12)
//       }
//     });

//     const token = createJWT(user);

//     return {token};
//   } catch (error) {
//     return error;
//   }
// }

// function createJWT(user) {
//   return  jwt.sign({id: user.id, email: user.email}, JWT_ACCESS_SECRET, {
//     expiresIn: '1d'
//   });
// }