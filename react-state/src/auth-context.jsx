import { createContext, useState } from "react";
const AuthContext = createContext();

function AuthProvider({ children }) {
  const [authenticated, setAuthenticated] = useState(false);
  return (
    <AuthContext.Provider value={{ authenticated, setAuthenticated }}>
      {children}
    </AuthContext.Provider>
  );
}

export { AuthContext, AuthProvider };
