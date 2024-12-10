export type Contact = {
  id: string
  name: string
  email: string
};

export type Client = {
  id: string
  name: string
  website?: string
  contacts: Contact[]
};

export type Workspace = {
  id: string
  name: string
};

export type Email = {
  address: string
  verified: boolean
};

export type User = {
  id: string
  name: string
  initials: string
  email: Email
  workspace: Workspace
};

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user?: User;
    };
};
