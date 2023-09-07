import { persistable } from "./persist";

export const token = persistable("token", "");
export const user = persistable("user", "");
